<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'John Doe',
                'email' => 'jmrashed@gmail.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'password' => bcrypt('12345678'),
            ],
            // Add more sample data as needed
        ];

        foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}
