<?php

namespace Database\Seeders;

use App\Models\Countries;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://restcountries.com/v3.1/all?fields=cca2,name');

        if ($response->successful()) {
            foreach ($response->json() as $country) {
                Countries::updateOrCreate([
                    'code' => $country['cca2'] ?? null,
                ], [
                    'name' => $country['name']['common'] ?? 'Unknown',
                ]);
            }
        } else {
            $this->command->error('❌ Gagal fetch country dari API.');
        }
    }
}
