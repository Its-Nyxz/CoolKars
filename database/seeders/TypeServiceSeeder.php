<?php

namespace Database\Seeders;

use App\Models\TypeService;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['name' => 'HEAVY SERVICE',  'code' => 'HEAVY'],
            ['name' => 'LIGHT SERVICE',  'code' => 'LIGHT'],
            ['name' => 'AC CARE',        'code' => 'AC'],
            ['name' => 'FREON',        'code' => 'FR'],
            ['name' => 'FLUSHING',        'code' => 'FL'],
            ['name' => 'ENGINE SERVICE', 'code' => 'ENGINE'],
            ['name' => 'DETAILING',      'code' => 'DETAIL'],
            ['name' => 'FRESH SERVICE',  'code' => 'FRESH'],
            ['name' => 'LAIN-LAIN',      'code' => 'OTHER'], // ✅ Tambahan
        ];

        foreach ($services as $service) {
            TypeService::updateOrCreate(
                ['name' => $service['name']],
                ['code' => $service['code']]
            );
        }
    }
}
