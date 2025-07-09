<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Uom;
use App\Models\Site;
use App\Models\Sparepart;
use App\Models\SparepartCar;
use App\Models\SparepartSite;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uoms = Uom::all();
        $cars = Car::all();
        $sites = Site::all();
        $names = [
            'Kampas Rem Depan',
            'Kampas Rem Belakang',
            'Filter Oli',
            'Filter Udara',
            'Filter Kabin',
            'Busi',
            'Aki',
            'Alternator',
            'Radiator',
            'Kipas Radiator',
            'Kompresor AC',
            'Condenser AC',
            'Evaporator AC',
            'Shockbreaker Depan',
            'Shockbreaker Belakang',
            'Kopling Set',
            'V-Belt',
            'Timing Belt',
            'Master Rem',
            'Kaliper Rem',
            'Power Steering Pump',
            'Water Pump',
            'ECU',
            'Sensor Oksigen',
            'Injector',
            'Tangki Bensin',
            'Knalpot',
            'Gearbox',
            'Headlamp',
            'Foglamp',
            'Panel Speedometer',
            'Handle Pintu',
            'Switch Power Window',
            'Kaca Spion',
            'Wiper Blade',
            'Motor Wiper',
            'Relay Starter',
            'Fuse Box',
            'Coil Ignition',
            'Ball Joint'
        ];

        for ($i = 1; $i <= 10; $i++) {
            $sparepart = Sparepart::create([
                'sparepart_code' => 'SPR-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'name' => $names[array_rand($names)],
                'status' => rand(0, 1),
                'denso' => rand(0, 1),
                'owning' => rand(0, 1), // 0 = CoolKars, 1 = Trading
                'uom_id' => $uoms->random()->id,
                'image_path' => null,
                'updated_by' => 1, // pastikan user ID 1 ada
            ]);

            // Relasi ke 1–2 mobil acak
            $cars->random(rand(1, 2))->each(function ($car) use ($sparepart) {
                SparepartCar::create([
                    'sparepart_id' => $sparepart->id,
                    'car_id' => $car->id,
                ]);
            });

            // Relasi ke 1–3 site acak dengan harga
            $sites->random(rand(1, 3))->each(function ($site) use ($sparepart) {
                SparepartSite::create([
                    'sparepart_id' => $sparepart->id,
                    'site_id' => $site->id,
                    'price' => rand(100000, 5000000), // harga IDR
                ]);
            });
        }
    }
}
