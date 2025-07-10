<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\Service;
use App\Models\ServiceSite;
use App\Models\TypeService;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $lightService = TypeService::where('name', 'LIGHT SERVICE')->first();
        $heavyService = TypeService::where('name', 'HEAVY SERVICE')->first();

        if (!$lightService || !$heavyService) {
            throw new \Exception("LIGHT SERVICE or HEAVY SERVICE not found in type_services table.");
        }

        $services = [
            [
                'service_code' => 'LGS-SRV-000-DBLB',
                'name' => 'Light Service Double Blower',
                'type' => 'HEAVY SERVICE',
                'status' => true,
                'site_name' => 'Fleet',
                'price' => 550000
            ],
            [
                'service_code' => 'AC-CARE-000-BRFN',
                'name' => 'AC Care & Boroscope Freon',
                'type' => 'HEAVY SERVICE',
                'status' => true,
                'site_name' => 'Honda Cimone',
                'price' => 337500
            ],
            [
                'service_code' => 'FRS-SRV-CBU-EURO',
                'name' => 'Fresh Service CBU Europe',
                'type' => 'HEAVY SERVICE',
                'status' => true,
                'site_name' => 'Mobeng GS',
                'price' => 150000
            ],
            [
                'service_code' => 'FRS-SRV-SML-MDM',
                'name' => 'Fresh Service Small Medium',
                'type' => 'HEAVY SERVICE',
                'status' => true,
                'site_name' => 'Project',
                'price' => 125000
            ],
            [
                'service_code' => 'AC-CARE-CBU-EURO',
                'name' => 'AC Care CBU Europe',
                'type' => 'HEAVY SERVICE',
                'status' => true,
                'site_name' => 'Mobeng BSD',
                'price' => 100000
            ],
            [
                'service_code' => 'AC-CARE-SML-MDM',
                'name' => 'AC Care Small Medium',
                'type' => 'HEAVY SERVICE',
                'status' => false,
                'site_name' => 'Mobeng Bekasi',
                'price' => 50000
            ],
            [
                'service_code' => 'PKT-000-MDK-FRS',
                'name' => 'Paket Mudik Fresh',
                'type' => 'LIGHT SERVICE',
                'status' => true,
                'site_name' => 'HNZ Muara Karang',
                'price' => 135000
            ],
            [
                'service_code' => 'PKT-000-RMD-HMT',
                'name' => 'Paket Rahmat (Ramadhan Hemat)',
                'type' => 'LIGHT SERVICE',
                'status' => true,
                'site_name' => 'Auto2000 Pandeglang',
                'price' => 675000
            ],
            [
                'service_code' => 'PKT-000-MDK-TRJN',
                'name' => 'Paket Mukmin (Mudik Terjamin)',
                'type' => 'LIGHT SERVICE',
                'status' => true,
                'site_name' => 'Auto2000 Pd. Jagung',
                'price' => 1200000
            ],
            [
                'service_code' => 'CAR-CARE-000-0000',
                'name' => 'Car Care',
                'type' => 'LIGHT SERVICE',
                'status' => true,
                'site_name' => 'Auto2000 Cikupa',
                'price' => 25000
            ]
        ];

        foreach ($services as $data) {
            $typeService = TypeService::where('name', $data['type'])->first();

            if (!$typeService) {
                echo "TypeService '{$data['type']}' not found. Skipping service '{$data['name']}'\n";
                continue;
            }

            $service = Service::create([
                'service_code' => $data['service_code'],
                'name' => $data['name'],
                'status' => $data['status'],
                'type_service_id' => $typeService->id,
            ]);

            $site = Site::where('name', $data['site_name'])->first();

            if ($site) {
                ServiceSite::create([
                    'service_id' => $service->id,
                    'site_id' => $site->id,
                    'price' => $data['price']
                ]);
            }
        }
    }
}
