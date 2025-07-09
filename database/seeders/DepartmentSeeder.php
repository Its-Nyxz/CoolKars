<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['DPT001', 'General', 'PCC'],
            ['DPT002', 'Coolkars PBP', 'PCC'],
            ['DPT003', 'Coolkars PCC', 'PCC'],
            ['DPT004', 'Coolkars Car Dealer', 'PCC'],
            ['DPT005', 'Fleet User', 'PCC'],
            ['DPT006', 'Project', 'PCC'],
            ['DPT007', 'Trading', 'Mobeng GS'],
            ['DPT008', 'Project', 'Mobeng GS'],
            ['DPT009', 'General', 'Mobeng GS'],
            ['DPT010', 'General', 'Auto2000 Pd. Jagung'],
        ];

        foreach ($data as $row) {
            $site = Site::where('name', $row[2])->first();

            if ($site) {
                Department::create([
                    'department_code'   => $row[0],
                    'department_name' => $row[1],
                    'site_id'         => $site->id,
                    'status'          => true,
                    'updated_by'      => 1, // pastikan user ID 1 ada
                ]);
            }
        }
    }
}
