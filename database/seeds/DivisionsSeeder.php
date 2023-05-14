<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample data
        $divisions = [
            ['id' => 1, 'country_row_id' => '1', 'division_name' => 'Barisal', 'division_name_bn' => 'বরিশাল'],
            ['id' => 2, 'country_row_id' => '1', 'division_name' => 'Chittagong', 'division_name_bn' => 'চট্টগ্রাম'],
            ['id' => 3, 'country_row_id' => '1', 'division_name' => 'Dhaka', 'division_name_bn' => 'ঢাকা'],
            ['id' => 4, 'country_row_id' => '1', 'division_name' => 'Khulna', 'division_name_bn' => 'খুলনা'],
            ['id' => 5, 'country_row_id' => '1', 'division_name' => 'Rajshahi', 'division_name_bn' => 'রাজশাহী'],
            ['id' => 6, 'country_row_id' => '1', 'division_name' => 'Rangpur', 'division_name_bn' => 'রংপুর'],
            ['id' => 7, 'country_row_id' => '1', 'division_name' => 'Sylhet', 'division_name_bn' => 'সিলেট'],
        ];

        // Insert sample data into the database
        Division::insert($divisions);
    }
}
