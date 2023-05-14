<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            // Define your data here
            // Example:
            [
                'division_row_id' => 3,
                'district_name' => 'Dhaka',
                'district_name_bn' => 'ঢাকা',
                'lat' => 23.7115253,
                'lon' => 90.4111451,
                'website' => 'www.dhaka.gov.bd',
            ],
            // Add more entries as needed
        ];

        District::insert($districts);
    }
}
