<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\CustomerBilling;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $paymentTerms = [0, 1, 2, 3, 4]; // COD, 7, 14, 30, 60 Hari
        $types = [0, 1, 2, 3]; // User, Corporate, Dealer, Distributor

        for ($i = 1; $i <= 10; $i++) {
            $customer = Customer::create([
                'customer_code' => 'CUST-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'name' => $faker->company,
                'type' => $types[array_rand($types)],
                'email' => $faker->unique()->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'contract_start_date' => now()->subMonths(rand(1, 12)),
                'contract_end_date' => now()->addMonths(rand(1, 12)),
                'document' => null,
                'payment_term' => $paymentTerms[array_rand($paymentTerms)],
                'is_blacklisted' => $faker->boolean(10), // 10% kemungkinan blacklisted
                'status' => true,
                'updated_by' => 1,
            ]);

            // Customer Car
            CustomerCar::create([
                'customer_id' => $customer->id,
                'car_id' => rand(1, 10), // pastikan ID car tersedia
                'odometer' => rand(5000, 200000),
                'license_plate' => 'B ' . rand(1000, 9999) . ' ' . chr(rand(65, 90)) . chr(rand(65, 90)),
            ]);

            // Customer Billing
            CustomerBilling::create([
                'customer_id' => $customer->id,
                'address_type' => rand(0, 2), // 0=Billing, 1=Dropship, 2=Office
                'name' => $customer->name,
                'nid' => rand(1001, 9999),
                'email' => $customer->email,
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'ppn' => rand(0, 1),
                'country_id' => rand(1, 1), // pastikan ID country tersedia (contoh: Indonesia = 1)
                'city_id' => rand(1, 5),    // sesuaikan dengan seed kota
                'zip_code_id' => rand(1, 10), // sesuaikan dengan seed zip
            ]);
        }
    }
}
