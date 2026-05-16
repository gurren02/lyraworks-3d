<?php

namespace Database\Seeders;

use App\Models\Printer;
use Illuminate\Database\Seeder;

class PrinterSeeder extends Seeder
{
    public function run(): void
    {
        $printers = [
            ['name' => 'Ender 3 V2 - 01', 'model' => 'Creality Ender 3 V2', 'status' => 'available', 'last_maintenance' => now()->subMonths(1)],
            ['name' => 'Ender 3 V2 - 02', 'model' => 'Creality Ender 3 V2', 'status' => 'printing', 'last_maintenance' => now()->subMonths(2)],
            ['name' => 'Prusa MK3S+', 'model' => 'Prusa i3 MK3S+', 'status' => 'available', 'last_maintenance' => now()->subDays(15)],
            ['name' => 'Bambu Lab P1P', 'model' => 'Bambu Lab P1P', 'status' => 'maintenance', 'last_maintenance' => now()->subMonths(3)],
            ['name' => 'Anycubic Photon M3', 'model' => 'Resin - Photon M3', 'status' => 'available', 'last_maintenance' => now()->subMonths(1)],
            ['name' => 'Artillery Sidewinder X2', 'model' => 'Sidewinder X2', 'status' => 'available', 'last_maintenance' => now()->subMonths(4)],
            ['name' => 'Voron 2.4 Custom', 'model' => 'Voron 2.4', 'status' => 'printing', 'last_maintenance' => now()->subDays(5)],
            ['name' => 'Elegoo Neptune 3', 'model' => 'Neptune 3 Pro', 'status' => 'available', 'last_maintenance' => now()->subMonths(2)],
            ['name' => 'Creality K1 High Speed', 'model' => 'Creality K1', 'status' => 'available', 'last_maintenance' => now()->subMonths(1)],
            ['name' => 'Resin Mars 3 Pro', 'model' => 'Elegoo Mars 3 Pro', 'status' => 'available', 'last_maintenance' => now()->subMonths(1)],
        ];

        foreach ($printers as $printer) {
            Printer::create($printer);
        }
    }
}
