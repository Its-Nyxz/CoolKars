<?php

namespace Database\Seeders;

use App\Models\Citie;
use App\Models\ZipCode;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ZipCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zipCodes = [
            // Jakarta
            ['city' => 'Jakarta', 'codes' => ['10110', '10210', '10310', '10410', '10510']],
            // Bogor
            ['city' => 'Bogor', 'codes' => ['16111', '16121', '16131', '16141']],
            // Depok
            ['city' => 'Depok', 'codes' => ['16411', '16412', '16413']],
            // Tangerang
            ['city' => 'Tangerang', 'codes' => ['15111', '15118', '15121']],
            // Bekasi
            ['city' => 'Bekasi', 'codes' => ['17111', '17113', '17114']],
        ];

        foreach ($zipCodes as $item) {
            $city = Citie::where('name', 'LIKE', '%' . $item['city'] . '%')->first();

            if (!$city) {
                $this->command->warn("⚠ Kota {$item['city']} tidak ditemukan.");
                continue;
            }

            foreach ($item['codes'] as $code) {
                ZipCode::updateOrCreate([
                    'city_id' => $city->id,
                    'code' => $code
                ]);
            }

            $this->command->info("✔ Kode Pos untuk {$item['city']} berhasil ditambahkan.");
        }
    }
}
