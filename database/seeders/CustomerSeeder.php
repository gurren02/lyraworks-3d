<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            ['name' => 'Juan Pérez', 'email' => 'juan.perez@example.com'],
            ['name' => 'María García', 'email' => 'maria.garcia@example.com'],
            ['name' => 'Carlos López', 'email' => 'carlos.lopez@example.com'],
            ['name' => 'Ana Martínez', 'email' => 'ana.martinez@example.com'],
            ['name' => 'Luis Rodríguez', 'email' => 'luis.rodriguez@example.com'],
            ['name' => 'Elena Sánchez', 'email' => 'elena.sanchez@example.com'],
            ['name' => 'Pedro Ramírez', 'email' => 'pedro.ramirez@example.com'],
            ['name' => 'Sofía Torres', 'email' => 'sofia.torres@example.com'],
            ['name' => 'Diego Flores', 'email' => 'diego.flores@example.com'],
            ['name' => 'Lucía Morales', 'email' => 'lucia.morales@example.com'],
        ];

        foreach ($customers as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('password123'),
                    'phone' => '55' . rand(10000000, 99999999),
                ]
            );
            
            // Asegurarnos de que tenga el rol de cliente
            $user->assignRole('customer');
        }
    }
}
