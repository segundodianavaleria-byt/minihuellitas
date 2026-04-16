<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mascota;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-ZáéíóúñÑ\s]+$/'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'telefono' => ['nullable', 'string', 'max:20'],
            'direccion' => ['nullable', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'terms' => ['required'],
            'mascotas' => ['required', 'array', 'min:1'],
            'mascotas.*.nombre' => ['required', 'string', 'max:100'],
            'mascotas.*.especie' => ['required', 'string', 'max:50'],
            'mascotas.*.raza' => ['nullable', 'string', 'max:100'],
            'mascotas.*.edad' => ['nullable', 'numeric', 'min:0', 'max:30'],
            'mascotas.*.sexo' => ['nullable', 'in:macho,hembra'],
            'mascotas.*.peso' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'mascotas.*.observaciones' => ['nullable', 'string', 'max:500'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'password' => Hash::make($request->password),
        ]);

        // Asignar rol de cliente por defecto
        $user->assignRole('cliente');

        // Registrar mascotas
        foreach ($request->mascotas as $mascotaData) {
            Mascota::create([
                'user_id' => $user->id,
                'nombre' => $mascotaData['nombre'],
                'especie' => $mascotaData['especie'],
                'raza' => $mascotaData['raza'] ?? null,
                'edad' => $mascotaData['edad'] ?? null,
                'sexo' => $mascotaData['sexo'] ?? null,
                'peso' => $mascotaData['peso'] ?? null,
                'observaciones_medicas' => $mascotaData['observaciones'] ?? null,
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard'));
    }
}