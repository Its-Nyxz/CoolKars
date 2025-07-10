<?php

namespace Database\Seeders;

use App\Models\Promo;
use App\Models\Service;
use App\Models\Sparepart;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil sparepart berdasarkan nama (pastikan data sudah ada)
        $expansi = Sparepart::where('name', 'Expansi Ford Everest')->first();
        $evaporator = Sparepart::where('name', 'Evaporator Nissan Serena Belakang')->first();
        $compressor = Sparepart::where('name', 'Compressor Wuling Confero')->first();

        $promos = [
            [
                'promo_code'     => 'PRM001',
                'name'           => 'Promo Ramadhan',
                'type'           => 0, // Sparepart
                'related_id'     => $expansi?->id,
                'discount'       => 5000,
                'discount_type'  => 1, // Fixed (IDR)
                'start_date'     => '2025-04-01',
                'end_date'       => '2025-04-30',
                'quantity'       => 100,
                'updated_by'     => 1,
            ],
            [
                'promo_code'     => 'PRM002',
                'name'           => 'Promo Kemerdekaan',
                'type'           => 0, // Sparepart
                'related_id'     => $evaporator?->id,
                'discount'       => 5,
                'discount_type'  => 0, // Percentage
                'start_date'     => '2025-04-01',
                'end_date'       => '2025-04-30',
                'quantity'       => 120,
                'updated_by'     => 1,
            ],
            [
                'promo_code'     => 'PRM003',
                'name'           => 'Promo Coolkars',
                'type'           => 0, // Sparepart
                'related_id'     => $compressor?->id,
                'discount'       => 10,
                'discount_type'  => 0, // Percentage
                'start_date'     => '2025-04-01',
                'end_date'       => '2025-04-30',
                'quantity'       => 100,
                'status'         => true,
                'updated_by'     => 1,
            ],
        ];

        foreach ($promos as $promo) {
            // Hanya seed jika related_id ditemukan
            if ($promo['related_id']) {
                Promo::create($promo);
            }
        }
    }
}
