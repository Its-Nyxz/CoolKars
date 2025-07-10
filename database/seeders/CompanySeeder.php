<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'companie_code' => 'CPY001',
                'name' => 'PT. Cipta Gemilang Bersama',
                'address_1' => 'Jl. Scientia Blvd No.12 Blok T, Medang, Kec. Pagedangan, Kabupaten Tangerang, Banten 15334',
                'phone' => '+62(21) 29014725',
                'fax' => '+62(21) 29014649',
                'email' => 'cs@cgbid.com',
                'npwp' => '21.148.022.0-XXXXX',
                'bank_name' => 'BCA',
                'bank_branch' => 'KCP Financial Center Gading Serpong',
                'bank_account_name' => 'PT. Cipta Gemilang Bersama',
                'bank_account_number' => '8015319999',
                'is_active' => true,

            ],
            [
                'companie_code' => 'CPY002',
                'name' => 'PT. Panca Bintang Perkasa',
                'address_1' => 'Jl. Pluit Karang Timur Blok O8 No. 41 RT.012/RW.017, Jakarta Utara',
                'phone' => '+62(21) 29014725',
                'fax' => '+62(21) 29014649',
                'email' => 'cs@pbpid.com',
                'npwp' => '21.148.022.0-YYYYY',
                'bank_name' => 'BCA',
                'bank_branch' => 'KCP Financial Center Gading Serpong',
                'bank_account_name' => 'PT. Panca Bintang Perkasa',
                'bank_account_number' => '8015319999',
                'is_active' => true,

            ],
        ];

        foreach ($companies as $data) {
            Company::create($data);
        }
    }
}
