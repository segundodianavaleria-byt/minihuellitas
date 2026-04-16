<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validaciones con mensajes en español
        $validator = Validator::make($request->all(), [
            // Datos del propietario
            'name' => [
                'required', 
                'string', 
                'max:100', 
                'regex:/^[a-zA-ZáéíóúñÑüÜ\s]+$/',
                'min:3'
            ],
            'email' => [
                'required', 
                'string', 
                'email', 
                'max:255', 
                'unique:users',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'telefono' => [
                'required', 
                'string', 
                'max:15',
                'regex:/^[0-9+\-\s()]+$/',
                'min:8'
            ],
            'direccion' => 'nullable|string|max:255',
            'password' => [
                'required', 
                'confirmed', 
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
            ],
            'terms' => 'required|accepted',
            
            // Datos de mascotas
            'mascotas' => 'required|array|min:1',
            'mascotas.*.nombre' => [
                'required', 
                'string', 
                'max:50', 
                'regex:/^[a-zA-ZáéíóúñÑüÜ\s]+$/',
                'min:2'
            ],
            'mascotas.*.especie' => 'required|in:perro,gato,conejo,ave,otro',
            'mascotas.*.raza' => 'nullable|string|max:50|regex:/^[a-zA-ZáéíóúñÑüÜ\s]+$/',
            'mascotas.*.edad' => 'nullable|numeric|min:0|max:30',
            'mascotas.*.sexo' => 'nullable|in:macho,hembra',
            'mascotas.*.peso' => 'nullable|numeric|min:0|max:100',
            'mascotas.*.observaciones' => 'nullable|string|max:500',
            'mascotas.*.foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            
        ], [
            // Mensajes de error en ESPAÑOL
            // Nombre
            'name.required' => 'El nombre es obligatorio.',
            'name.regex' => 'El nombre solo puede contener letras y espacios.',
            'name.min' => 'El nombre debe tener al menos 3 caracteres.',
            'name.max' => 'El nombre no puede tener más de 100 caracteres.',
            
            // Email
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingresa un correo electrónico válido (ejemplo: usuario@dominio.com).',
            'email.unique' => 'Este correo electrónico ya está registrado. Por favor inicia sesión o usa otro correo.',
            'email.regex' => 'Ingresa un correo electrónico válido.',
            'email.max' => 'El correo no puede tener más de 255 caracteres.',
            
            // Teléfono
            'telefono.required' => 'El número de teléfono es obligatorio.',
            'telefono.regex' => 'Ingresa un número de teléfono válido (solo números, guiones o espacios).',
            'telefono.min' => 'El teléfono debe tener al menos 8 dígitos.',
            'telefono.max' => 'El teléfono no puede tener más de 15 dígitos.',
            
            // Contraseña
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.regex' => 'La contraseña debe contener: una letra mayúscula, una letra minúscula, un número y un carácter especial (@$!%*?&).',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            
            // Términos
            'terms.required' => 'Debes aceptar los términos y condiciones.',
            'terms.accepted' => 'Debes aceptar los términos y condiciones.',
            
            // Mascotas general
            'mascotas.required' => 'Debes registrar al menos una mascota.',
            'mascotas.array' => 'Los datos de las mascotas no son válidos.',
            'mascotas.min' => 'Debes registrar al menos una mascota.',
            
            // Nombre de mascota
            'mascotas.*.nombre.required' => 'El nombre de la mascota es obligatorio.',
            'mascotas.*.nombre.regex' => 'El nombre de la mascota solo puede contener letras y espacios.',
            'mascotas.*.nombre.min' => 'El nombre de la mascota debe tener al menos 2 caracteres.',
            'mascotas.*.nombre.max' => 'El nombre de la mascota no puede tener más de 50 caracteres.',
            
            // Especie
            'mascotas.*.especie.required' => 'La especie de la mascota es obligatoria.',
            'mascotas.*.especie.in' => 'Selecciona una especie válida (perro, gato, conejo, ave u otro).',
            
            // Raza
            'mascotas.*.raza.regex' => 'La raza solo puede contener letras y espacios.',
            'mascotas.*.raza.max' => 'La raza no puede tener más de 50 caracteres.',
            
            // Edad
            'mascotas.*.edad.numeric' => 'La edad debe ser un número.',
            'mascotas.*.edad.min' => 'La edad no puede ser negativa.',
            'mascotas.*.edad.max' => 'La edad no puede ser mayor a 30 años.',
            
            // Sexo
            'mascotas.*.sexo.in' => 'Selecciona un sexo válido (macho o hembra).',
            
            // Peso
            'mascotas.*.peso.numeric' => 'El peso debe ser un número.',
            'mascotas.*.peso.min' => 'El peso no puede ser negativo.',
            'mascotas.*.peso.max' => 'El peso no puede ser mayor a 100 kg.',
            
            // Observaciones
            'mascotas.*.observaciones.max' => 'Las observaciones no pueden tener más de 500 caracteres.',
            
            // Foto
            'mascotas.*.foto.image' => 'El archivo debe ser una imagen.',
            'mascotas.*.foto.mimes' => 'La imagen debe ser de tipo: JPEG, PNG, JPG o GIF.',
            'mascotas.*.foto.max' => 'La imagen no puede superar los 2 megabytes (2MB).'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Crear usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'password' => Hash::make($request->password),
        ]);

        // Asignar rol de cliente
        $user->assignRole('cliente');

        // Registrar mascotas
        foreach ($request->mascotas as $index => $mascotaData) {
            // Subir foto si existe
            $fotoPath = null;
            if ($request->hasFile("mascotas.{$index}.foto")) {
                $file = $request->file("mascotas.{$index}.foto");
                $nombreArchivo = time() . '_' . $index . '_' . preg_replace('/[^a-zA-Z0-9]/', '_', $mascotaData['nombre']) . '.' . $file->getClientOriginalExtension();
                $fotoPath = $file->storeAs('mascotas', $nombreArchivo, 'public');
            }
            
            Mascota::create([
                'user_id' => $user->id,
                'nombre' => $mascotaData['nombre'],
                'especie' => $mascotaData['especie'],
                'raza' => $mascotaData['raza'] ?? null,
                'edad' => $mascotaData['edad'] ?? null,
                'sexo' => $mascotaData['sexo'] ?? null,
                'peso' => $mascotaData['peso'] ?? null,
                'observaciones_medicas' => $mascotaData['observaciones'] ?? null,
                'foto' => $fotoPath,
            ]);
        }

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', '¡Bienvenido a MiniHuellitas! Tu cuenta ha sido creada exitosamente.');
    }
}