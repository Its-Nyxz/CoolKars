<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['role_code' => 'RID-001', 'name' => 'Admin'],
            ['role_code' => 'RID-002', 'name' => 'Admin Bengkel'],
            ['role_code' => 'RID-003', 'name' => 'Service Advisor'],
            ['role_code' => 'RID-004', 'name' => 'Mechanic'],
            ['role_code' => 'RID-005', 'name' => 'Logistic'],
            ['role_code' => 'RID-006', 'name' => 'Sales'],
            ['role_code' => 'RID-007', 'name' => 'Customer Service'],
            ['role_code' => 'RID-008', 'name' => 'Finance'],
            ['role_code' => 'RID-009', 'name' => 'Supervisor'],
            ['role_code' => 'RID-010', 'name' => 'Manager'],
        ];

        foreach ($roles as $r) {
            Role::updateOrCreate(
                ['name' => $r['name']],            // conditions
                ['role_code' => $r['role_code']]   // fields to update/create
            );
        }
    }
}
