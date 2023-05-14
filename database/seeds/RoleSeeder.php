<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'owner',
                'display_name' => 'Project Owner',
                'description' => 'User is the owner of a given project',
                'created_at' => '2017-06-08 05:16:34',
                'updated_at' => '2017-06-08 02:21:36',
            ],
            [
                'name' => 'admin',
                'display_name' => 'User Administrator',
                'description' => 'User is allowed to manage and edit other users',
                'created_at' => '2017-06-08 05:16:34',
                'updated_at' => '2017-06-08 02:21:36',
            ],
            // Add more sample data as needed
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
