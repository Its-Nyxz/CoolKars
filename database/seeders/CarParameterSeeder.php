<?php

namespace Database\Seeders;

use App\Models\CarParameter;
use Illuminate\Database\Seeder;
use App\Models\CarParameterOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $checkingParams = [
            'Refrigerant 134a',
            'Condensor',
            'Radiator',
            'Fan Belt',
            'Compressor',
            'Magnet Clutch',
            'Motor Fan',
            'Pipe',
            'Hose',
            'Dryer',
            'Air Filter',
            'Motor Blower',
            'Expansion Valve',
            'Evaporator',
            'Seal'
        ];

        $serviceParams = [
            'Cek AC',
            'AC Care Boroscope',
            'Express Service',
            'Light Service',
            'Flushing',
            'Heavy Service'
        ];

        $optionSamples = ['Normal', 'Tidak Ada', 'Kurang', 'Kosong', 'Rusak', 'Tersumbat'];

        $updatedBy = 1; // pastikan user id 1 tersedia

        // Insert Checking Category (0)
        foreach ($checkingParams as $i => $name) {
            $param = CarParameter::create([
                'parameter_code' => 'PCC' . str_pad($i + 1, 3, '0', STR_PAD_LEFT),
                'name'           => $name,
                'category'       => 0, // Checking
                'status'         => true,
                'updated_by'     => $updatedBy,
            ]);

            // Tambahkan 2 opsi acak
            for ($j = 0; $j < 2; $j++) {
                CarParameterOption::create([
                    'car_parameter_id' => $param->id,
                    'name'             => $optionSamples[array_rand($optionSamples)],
                    'category'         => 1, // Issue Found
                ]);
            }
        }

        // Insert Service Category (1)
        foreach ($serviceParams as $i => $name) {
            $param = CarParameter::create([
                'parameter_code' => 'PCC' . str_pad($i + count($checkingParams) + 1, 3, '0', STR_PAD_LEFT),
                'name'           => $name,
                'category'       => 1, // Service
                'status'         => true,
                'updated_by'     => $updatedBy,
            ]);

            // Tambahkan 2 opsi acak
            for ($j = 0; $j < 2; $j++) {
                CarParameterOption::create([
                    'car_parameter_id' => $param->id,
                    'name'             => $optionSamples[array_rand($optionSamples)],
                    'category'         => 1, // Issue Found
                ]);
            }
        }
    }
}
