<?php

namespace Database\Seeders;

use App\Models\Bloodgroup;
use Illuminate\Database\Seeder;

class BloodgroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bloodgroups = [
            [
                'bloodgroup_name' => 'A+',
                'sort_order' => 1,
                'created_datetime' => now(),
            ],
            [
                'bloodgroup_name' => 'A-',
                'sort_order' => 2,
                'created_datetime' => now(),
            ],
            [
                'bloodgroup_name' => 'B+',
                'sort_order' => 3,
                'created_datetime' => now(),
            ],
            [
                'bloodgroup_name' => 'B-',
                'sort_order' => 4,
                'created_datetime' => now(),
            ],
            [
                'bloodgroup_name' => 'AB+',
                'sort_order' => 5,
                'created_datetime' => now(),
            ],
            [
                'bloodgroup_name' => 'AB-',
                'sort_order' => 6,
                'created_datetime' => now(),
            ],
            [
                'bloodgroup_name' => 'O+',
                'sort_order' => 7,
                'created_datetime' => now(),
            ],
            [
                'bloodgroup_name' => 'O-',
                'sort_order' => 8,
                'created_datetime' => now(),
            ],
        ];

        foreach ($bloodgroups as $bloodgroup) {
            Bloodgroup::create($bloodgroup);
        }
    }
}
