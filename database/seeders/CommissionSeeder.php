<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\Service;
use App\Models\Commission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil site untuk non-dealer dan dealer
        $nonDealerSite = Site::where('name', 'Fleet')->first(); // misal: Fleet
        $dealerSite = Site::where('name', 'Mobeng GS')->first();

        if (!$nonDealerSite || !$dealerSite) {
            $this->command->warn("Site not found. Seeder aborted.");
            return;
        }

        $services = Service::all();

        foreach ($services as $service) {
            // Non-Dealer commission
            Commission::create([
                'site_id' => $nonDealerSite->id,
                'service_id' => $service->id,
                'is_dealer' => false,
                'total_incentive' => rand(15000, 120000),

            ]);

            // Dealer commission with random breakdown
            $total = rand(100000, 200000);
            Commission::create([
                'site_id' => $dealerSite->id,
                'service_id' => $service->id,
                'is_dealer' => true,
                'total_incentive' => $total,

                'service_advisor' => rand(2, 5), // percent
                'service_advisor_is_percent' => true,

                'kabeng' => rand(10000, 20000), // nominal
                'kabeng_is_percent' => false,

                'admin' => rand(1, 3), // percent
                'admin_is_percent' => true,

                'kacab' => rand(10000, 20000), // nominal
                'kacab_is_percent' => false,


            ]);
        }

        $this->command->info('Commission data seeded successfully.');
    }
}
