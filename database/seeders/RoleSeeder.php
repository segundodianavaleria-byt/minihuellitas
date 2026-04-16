<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles
        $admin = Role::create(['name' => 'admin']);
        $cliente = Role::create(['name' => 'cliente']);
        
        // Crear permisos
        $permissions = [
            'ver dashboard',
            'gestionar usuarios',
            'gestionar mascotas',
            'gestionar servicios',
            'gestionar productos',
            'ver reportes'
        ];
        
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        
        // Asignar permisos a admin
        $admin->givePermissionTo(Permission::all());
    }
}