<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345678'), // atau '1sampai8''
        ]);

        $this->call([
            RoleSeeder::class,
            CompanySeeder::class,
            SiteSeeder::class,
            DepartmentSeeder::class,
            CarTypeSeeder::class,
            TypeServiceSeeder::class,
            CarSeeder::class,
            CarParameterSeeder::class,
            CountriesSeeder::class,
            CitieSeeder::class,
            ZipCodeSeeder::class,
            CustomerSeeder::class,
            UomSeeder::class,
            SparepartSeeder::class,
            ServiceSeeder::class,
            PromoSeeder::class,
            CommissionSeeder::class,
            CommissionRuleSeeder::class,
        ]);
    }
}
