<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = ['Tangerang', 'Bekasi', 'Tangerang Selatan', 'Jakarta'];

        $sites = [
            'Holy Ban Golf Island',
            'Holy Ban PIK 2',
            'HNZ Muara Karang',
            'Holy Ban Muara Karang',
            'Holy Ban Cengkareng',
            'Mobeng GS',
            'Mobeng BSD',
            'Mobeng Bekasi',
            'Daihatsu KZU',
            'PCC',
            'E-Commerce',
            'Wuling GS',
            'PMP/H8',
            'Fleet',
            'Konsinyasi',
            'WH PO Return',
            'Honda Alsut',
            'CarSome',
            'BOS Cipondoh',
            'POM Bensin GS',
            'Sparepart Jual',
            'Project',
            'Plaza Toyota GS',
            'Honda Cimone',
            'Dalam Claim',
            'Auto 2000 Pd. Jagung',
            'Auto 2000 Pandeglang',
            'Auto 2000 Cikupa',
            'Auto 2000 Alsut',
            'PCC',
        ];

        foreach ($sites as $index => $siteName) {
            Site::create([
                'site_code' => 'SITE' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                'name' => $siteName,
                'category' => $index % 2 === 0 ? Site::CATEGORY_CAR_DEALER : Site::CATEGORY_COOLKARS,
                'company_id' => 1,  // sesuaikan dengan id company
                'address_1' => 'Jl. Contoh Alamat No. ' . ($index + 1),
                'address_2' => 'Alamat Tambahan ' . ($index + 1),
                'city' => $cities[array_rand($cities)],
                'phone' => '0812-0000-' . str_pad($index + 1, 4, '0', STR_PAD_LEFT),
                'is_active' => $index % 2 === 0,
                'target_omset_monthly' => rand(50000000, 150000000),
                'commission_achieved' => rand(5, 10),
                'commission_not_achieved' => rand(1, 4),
                // opsional, pastikan user id 1 ada
            ]);
        }
    }
}
