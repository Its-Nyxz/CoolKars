<?php

namespace Database\Seeders;

use App\Models\Citie;
use App\Models\Countries;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh data - sesuaikan dengan kode negara di tabel countries
        $indonesia = Countries::where('code', 'ID')->first();
        $usa = Countries::where('code', 'US')->first();

        if (!$indonesia || !$usa) {
            $this->command->warn("⚠ Country ID or US not found. Please run CountriesSeeder first.");
            return;
        }

        $cities = [
            // Untuk Indonesia
            ['country_id' => $indonesia->id, 'name' => 'Jakarta', 'state' => 'DKI Jakarta'],
            ['country_id' => $indonesia->id, 'name' => 'Bogor', 'state' => 'Jawa Barat'],
            ['country_id' => $indonesia->id, 'name' => 'Depok', 'state' => 'Jawa Barat'],
            ['country_id' => $indonesia->id, 'name' => 'Tangerang', 'state' => 'Banten'],
            ['country_id' => $indonesia->id, 'name' => 'Tangerang Selatan', 'state' => 'Banten'],
            ['country_id' => $indonesia->id, 'name' => 'Bekasi', 'state' => 'Jawa Barat'],
            ['country_id' => $indonesia->id, 'name' => 'Kabupaten Bekasi', 'state' => 'Jawa Barat'],
            ['country_id' => $indonesia->id, 'name' => 'Kabupaten Bogor', 'state' => 'Jawa Barat'],
            ['country_id' => $indonesia->id, 'name' => 'Kabupaten Tangerang', 'state' => 'Banten'],

            // Untuk USA
            // ['country_id' => $usa->id, 'name' => 'New York', 'state' => 'New York'],
            // ['country_id' => $usa->id, 'name' => 'Los Angeles', 'state' => 'California'],
            // ['country_id' => $usa->id, 'name' => 'Chicago', 'state' => 'Illinois'],
            // ['country_id' => $usa->id, 'name' => 'Houston', 'state' => 'Texas'],
        ];

        foreach ($cities as $city) {
            Citie::updateOrCreate([
                'name' => $city['name'],
                'country_id' => $city['country_id'],
            ], [
                'state' => $city['state']
            ]);
        }

        $this->command->info('✔ Cities seeded successfully.');
    }
}
