<?php

namespace Database\Seeders;

use App\Models\DonorDetail;
use Illuminate\Database\Seeder;

class DonorDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        DonorDetail::factory()->count(100)->create();

    }
}
