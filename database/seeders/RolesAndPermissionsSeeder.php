<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super admin']);

        // Permissions
        Permission::create(['name' => 'view dashboard']);
        Permission::create(['name' => 'view risks']);
        Permission::create(['name' => 'view controls']);
        Permission::create(['name' => 'view action plans']);
        Permission::create(['name' => 'view settings']);
        Permission::create(['name' => 'manage users']);

        // Assign permissions to roles
        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo([
            'view dashboard',
            'view risks',
            'view controls',
            'view action plans',
            'view settings',
        ]);

        $roleSuperAdmin = Role::findByName('super admin');
        $roleSuperAdmin->givePermissionTo([
            'view dashboard',
            'view risks',
            'view controls',
            'view action plans',
            'view settings',
            'manage users',
        ]);
    }
}
