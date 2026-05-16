<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Roles
        $this->call(RoleSeeder::class);

        // 2. Usuarios específicos
        $admin = User::create([
            'name' => 'Jesus Pech',
            'email' => 'admin@lyraworks.com',
            'password' => Hash::make('password'),
            'phone' => '1234567890',
        ]);
        $admin->assignRole('admin');

        $shipper1 = User::create([
            'name' => 'Mario Envíos',
            'email' => 'mario@lyraworks.com',
            'password' => Hash::make('password'),
        ]);
        $shipper1->assignRole('shipper');

        $shipper2 = User::create([
            'name' => 'Sofía Logística',
            'email' => 'sofia@lyraworks.com',
            'password' => Hash::make('password'),
        ]);
        $shipper2->assignRole('shipper');

        $op1 = User::create([
            'name' => 'Roberto Impresor',
            'email' => 'roberto@lyraworks.com',
            'password' => Hash::make('password'),
        ]);
        $op1->assignRole('operator');

        $op2 = User::create([
            'name' => 'Ana Tech',
            'email' => 'ana@lyraworks.com',
            'password' => Hash::make('password'),
        ]);
        $op2->assignRole('operator');

        // 3. Otros datos
        $this->call([
            MaterialSeeder::class,
            PrinterSeeder::class,
        ]);
    }
}
