<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'admin.dashboard',
            'admin.roles.index',
            'admin.roles.create',
            'admin.roles.edit',
            'admin.roles.destroy',
            'admin.users.index',
            'admin.materials.index',
            'admin.printers.index',
            'admin.orders.index',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
