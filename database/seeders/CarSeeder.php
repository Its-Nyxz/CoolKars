<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            ['TYT001', 'Toyota',     'Avanza',        'Medium',  '2020', '1500'],
            ['FRD001', 'Ford',       'Ranger',        'CBU',     '2022', '2200'],
            ['MTB001', 'Mitsubishi', 'Pajero Sport',  'Europe',  '2021', '2400'],
            ['HND001', 'Honda',      'Civic',         'Medium',  '2018', '1800'],
            ['SZK001', 'Suzuki',     'Ertiga',        'Europe',  '2019', '1500'],
            ['DHU001', 'Daihatsu',   'Terios',        'CBU',     '2022', '1500'],
            ['NSN001', 'Nissan',     'X-Trail',       'CBU',     '2017', '2000'],
            ['HYD001', 'Hyundai',    'Stargazer',     'Europe',  '2023', '1500'],
            ['KIA001', 'Kia',        'Seltos',        'Medium',  '2021', '1400'],
            ['MZD001', 'Mazda',      'CX-5',          'Medium',  '2020', '2500'],
            ['HND002', 'Honda',      'Brio',          'Small',   '2020', '1200'],
            ['SZK002', 'Suzuki',     'Ignis',         'Small',   '2021', '1200'],
            ['NSN002', 'Nissan',     'March',         'Small',   '2019', '1200'],
            ['KIA002', 'Kia',        'Picanto',       'Small',   '2022', '1200'],
            ['BUS001', 'Mercedes',   'Sprinter',      'Bus',     '2021', '3000'],
            ['BUS002', 'Isuzu',      'Elf Long',      'Bus',     '2020', '2800'],
            ['BUS003', 'Hino',       'RN 285',        'Bus',     '2019', '7200'],
            ['BUS004', 'Mitsubishi', 'Rosa',          'Bus',     '2022', '3500'],
        ];

        foreach ($cars as $car) {
            $carType = CarType::where('name', $car[3])->first();

            if (!$carType) {
                echo "Car type '{$car[3]}' not found. Skipping {$car[2]}.\n";
                continue;
            }

            Car::create([
                'car_code'    => $car[0],
                'brand'       => $car[1],
                'model'       => $car[2],
                'car_type_id' => $carType->id,
                'cc'          => $car[5],
                'updated_by'  => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
