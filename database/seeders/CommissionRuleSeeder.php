<?php

namespace Database\Seeders;

use App\Models\CarType;
use App\Models\TypeService;
use App\Models\CommissionRule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommissionRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rules = [

            // ==== NON DEALER ====
            // Small
            ['Small', 'HEAVY SERVICE', 'SINGLE', 55000, false],
            ['Small', 'HEAVY SERVICE', 'DOUBLE', 65000, false],
            ['Small', 'LIGHT SERVICE', 'SINGLE', 30000, false],
            ['Small', 'AC CARE', null, 5000, false],
            ['Small', 'FREON', null, 5000, false],
            ['Small', 'FLUSHING', null, 25000, false],
            ['Small', 'JASA LAIN-LAIN', 'I', 10000, false],
            ['Small', 'JASA LAIN-LAIN', 'II', 10000, false],
            ['Small', 'JASA LAIN-LAIN', 'III', 10000, false],

            // Medium
            ['Medium', 'HEAVY SERVICE', 'SINGLE', 60500, false],
            ['Medium', 'HEAVY SERVICE', 'DOUBLE', 71500, false],
            ['Medium', 'LIGHT SERVICE', 'SINGLE', 33000, false],
            ['Medium', 'AC CARE', null, 5500, false],
            ['Medium', 'FREON', null, 5500, false],
            ['Medium', 'FLUSHING', null, 25000, false],
            ['Medium', 'JASA LAIN-LAIN', 'I', 11000, false],
            ['Medium', 'JASA LAIN-LAIN', 'II', 11000, false],
            ['Medium', 'JASA LAIN-LAIN', 'III', 11000, false],

            // CBU
            ['CBU', 'HEAVY SERVICE', 'SINGLE', 75625, false],
            ['CBU', 'HEAVY SERVICE', 'DOUBLE', 89375, false],
            ['CBU', 'LIGHT SERVICE', 'SINGLE', 41250, false],
            ['CBU', 'AC CARE', null, 6875, false],
            ['CBU', 'FREON', null, 6875, false],
            ['CBU', 'FLUSHING', null, 25000, false],
            ['CBU', 'JASA LAIN-LAIN', 'I', 13750, false],
            ['CBU', 'JASA LAIN-LAIN', 'II', 13750, false],
            ['CBU', 'JASA LAIN-LAIN', 'III', 13750, false],

            // Europe
            ['Europe', 'HEAVY SERVICE', 'SINGLE', 94531, false],
            ['Europe', 'HEAVY SERVICE', 'DOUBLE', 111719, false],
            ['Europe', 'LIGHT SERVICE', 'SINGLE', 51563, false],
            ['Europe', 'AC CARE', null, 8594, false],
            ['Europe', 'FREON', null, 8594, false],
            ['Europe', 'FLUSHING', null, 25000, false],
            ['Europe', 'JASA LAIN-LAIN', 'I', 17188, false],
            ['Europe', 'JASA LAIN-LAIN', 'II', 17188, false],
            ['Europe', 'JASA LAIN-LAIN', 'III', 17188, false],

            // Bus
            ['Bus', 'HEAVY SERVICE', 'SINGLE', 66550, false],
            ['Bus', 'HEAVY SERVICE', 'DOUBLE', 78650, false],
            ['Bus', 'LIGHT SERVICE', 'SINGLE', 36300, false],
            ['Bus', 'AC CARE', null, 50000, false],
            ['Bus', 'FREON', null, 6050, false],
            ['Bus', 'FLUSHING', null, 25000, false],
            ['Bus', 'JASA LAIN-LAIN', 'I', 12100, false],
            ['Bus', 'JASA LAIN-LAIN', 'II', 12100, false],
            ['Bus', 'JASA LAIN-LAIN', 'III', 12100, false],

            // ==== DEALER ====
            // Small
            ['Small', 'HEAVY SERVICE', 'SINGLE', 50000, true],
            ['Small', 'HEAVY SERVICE', 'DOUBLE', 50000, true],
            ['Small', 'LIGHT SERVICE', 'SINGLE', 10000, true],
            ['Small', 'AC CARE', null, 10000, true],
            ['Small', 'FREON', null, 5000, true],
            ['Small', 'FLUSHING', null, 25000, true],
            ['Small', 'JASA LAIN-LAIN', 'I', 10000, true],
            ['Small', 'JASA LAIN-LAIN', 'II', 10000, true],
            ['Small', 'JASA LAIN-LAIN', 'III', 10000, true],

            // Medium
            ['Medium', 'HEAVY SERVICE', 'SINGLE', 55500, true],
            ['Medium', 'HEAVY SERVICE', 'DOUBLE', 55500, true],
            ['Medium', 'LIGHT SERVICE', 'SINGLE', 11100, true],
            ['Medium', 'AC CARE', null, 10000, true],
            ['Medium', 'FREON', null, 5000, true],
            ['Medium', 'FLUSHING', null, 25000, true],
            ['Medium', 'JASA LAIN-LAIN', 'I', 10000, true],
            ['Medium', 'JASA LAIN-LAIN', 'II', 10000, true],
            ['Medium', 'JASA LAIN-LAIN', 'III', 10000, true],

            // CBU
            ['CBU', 'HEAVY SERVICE', 'SINGLE', 63270, true],
            ['CBU', 'HEAVY SERVICE', 'DOUBLE', 63270, true],
            ['CBU', 'LIGHT SERVICE', 'SINGLE', 12654, true],
            ['CBU', 'AC CARE', null, 10000, true],
            ['CBU', 'FREON', null, 5000, true],
            ['CBU', 'FLUSHING', null, 25000, true],
            ['CBU', 'JASA LAIN-LAIN', 'I', 10000, true],
            ['CBU', 'JASA LAIN-LAIN', 'II', 10000, true],
            ['CBU', 'JASA LAIN-LAIN', 'III', 10000, true],

            // Europe
            ['Europe', 'HEAVY SERVICE', 'SINGLE', 74026, true],
            ['Europe', 'HEAVY SERVICE', 'DOUBLE', 74026, true],
            ['Europe', 'LIGHT SERVICE', 'SINGLE', 14805, true],
            ['Europe', 'AC CARE', null, 10000, true],
            ['Europe', 'FREON', null, 5000, true],
            ['Europe', 'FLUSHING', null, 25000, true],
            ['Europe', 'JASA LAIN-LAIN', 'I', 10000, true],
            ['Europe', 'JASA LAIN-LAIN', 'II', 10000, true],
            ['Europe', 'JASA LAIN-LAIN', 'III', 10000, true],
        ];

        foreach ($rules as [$carTypeName, $typeServiceName, $acSystem, $commission, $isDealer]) {
            $carType = CarType::where('name', $carTypeName)->first();
            $typeService = TypeService::where('name', $typeServiceName)->first();

            if ($carType && $typeService) {
                CommissionRule::updateOrCreate(
                    [
                        'car_type_id' => $carType->id,
                        'type_service_id' => $typeService->id,
                        'ac_system' => $acSystem,
                        'is_dealer' => $isDealer
                    ],
                    [
                        'base_commission' => $commission,
                    ]
                );
            }
        }
    }
}
