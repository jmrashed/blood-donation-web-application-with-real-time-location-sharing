<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'jmrashed1@gmail.com',
                'password' => bcrypt('12345678'),
                'is_admin' => true,
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jmrashedbd@gmail.com',
                'password' => bcrypt('12345678'),
                'is_admin' => false,
            ],
            // Add more sample data as needed
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
