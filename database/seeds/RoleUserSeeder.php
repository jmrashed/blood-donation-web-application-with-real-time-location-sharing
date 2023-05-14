<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve user and role IDs as needed
        $userIds = User::pluck('id')->toArray();

        // Insert data into the table
        foreach ($userIds as $key => $user_id) {
            $new = new RoleUser();
            $new->user_id = $user_id;
            $new->role_id = 1;
            $new->save();
        }
    }
}
