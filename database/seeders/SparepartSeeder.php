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
            'Expansi Ford Everest',
            'Evaporator Nissan Serena Belakang',
            'Compressor Wuling Confero',
            'Van Belt A-36',
            'Comp Assy D26A',
            'Condensor Sirion',
            'Thermistor Honda HRV',
            'Condensor Cleaning Liquid',
            'Evaporator Suzuki SX4',
            'Condensor Suzuki SX4',
        ];


        foreach ($names as $index => $name) {
            $sparepart = Sparepart::create([
                'sparepart_code' => 'SPR-' . str_pad($index, 3, '0', STR_PAD_LEFT),
                'name' => $name,
                'status' => rand(0, 1),
                'denso' => rand(0, 1),
                'owning' => rand(0, 1), // 0 = CoolKars, 1 = Trading
                'uom_id' => $uoms->random()->id,
                'image_path' => null,
                // pastikan user ID 1 ada
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
