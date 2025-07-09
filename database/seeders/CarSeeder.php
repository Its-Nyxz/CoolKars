<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typeMap = [
            'Medium' => 0,
            'CBU'    => 1,
            'Europe' => 2,
        ];

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
        ];

        foreach ($cars as $car) {
            Car::create([
                'car_code'    => $car[0],
                'brand'       => $car[1],
                'model'       => $car[2],
                'type'        => $typeMap[$car[3]] ?? 0,
                'cc'          => $car[5],
                'updated_by'  => 1,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
