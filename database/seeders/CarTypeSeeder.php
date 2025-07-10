<?php

namespace Database\Seeders;

use App\Models\CarType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carTypes = [
            ['name' => 'Medium', 'code' => 'MED', 'description' => 'Medium size cars'],
            ['name' => 'CBU',    'code' => 'CBU', 'description' => 'Completely Built-Up cars'],
            ['name' => 'Europe', 'code' => 'EU',  'description' => 'European model cars'],
            ['name' => 'Small',  'code' => 'SM',  'description' => 'Small size cars'],
            ['name' => 'Bus',    'code' => 'BUS', 'description' => 'Commercial buses'],
        ];

        foreach ($carTypes as $type) {
            CarType::updateOrCreate(
                ['name' => $type['name']],
                [
                    'code' => $type['code'],
                    'description' => $type['description'],

                ]
            );
        }
    }
}
