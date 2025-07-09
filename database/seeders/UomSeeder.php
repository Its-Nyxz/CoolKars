<?php

namespace Database\Seeders;

use App\Models\Uom;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uoms = [
            ['name' => 'EA', 'description' => 'Each'],
            ['name' => 'UNT', 'description' => 'Unit'],
            ['name' => 'BTL', 'description' => 'Bottle'],
            ['name' => 'MLL', 'description' => 'Milliliter'],
            ['name' => 'TUB', 'description' => 'Tube'],
            ['name' => 'JUG', 'description' => 'Jug'],
            ['name' => 'GRM', 'description' => 'Gram'],
            ['name' => 'Kgs', 'description' => 'Kilograms'],
            ['name' => 'GLN', 'description' => 'Gallon'],
            ['name' => 'LTR', 'description' => 'Liter'],
            ['name' => 'PL',  'description' => 'Pail'],
            ['name' => 'MTR', 'description' => 'Meter'],
            ['name' => 'BTG', 'description' => 'Batang'],
            ['name' => 'CM',  'description' => 'Centimeter'],
            ['name' => 'SET', 'description' => 'Set'],
            ['name' => 'Drm', 'description' => 'Drum'],
            ['name' => 'CYL', 'description' => 'Cylinder'],
            ['name' => 'KLG', 'description' => 'Kolong'], // Asumsi sesuai format umum
        ];

        foreach ($uoms as $uom) {
            Uom::updateOrCreate(
                ['name' => $uom['name']],
                ['description' => $uom['description']]
            );
        }
    }
}
