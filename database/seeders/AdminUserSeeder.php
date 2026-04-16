<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Crear rol admin si no existe
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $clienteRole = Role::firstOrCreate(['name' => 'cliente']);
        
        // Crear usuario admin
        $admin = User::updateOrCreate(
            ['email' => 'admin@minihuellitas.com'],
            [
                'name' => 'Administrador',
                'email' => 'admin@minihuellitas.com',
                'password' => bcrypt('Admin123456'),
                'telefono' => '5512345678',
            ]
        );
        
        $admin->assignRole('admin');
        
        $this->command->info('Usuario admin creado: admin@minihuellitas.com / Admin123456');
    }
}