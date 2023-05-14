<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'create-post',
                'display_name' => 'Create Posts',
                'description' => 'Create new blog posts',
            ],
            [
                'name' => 'edit-user',
                'display_name' => 'Edit Users',
                'description' => 'Edit existing users',
            ],
        ];

        Permission::insert($permissions);
    }
}
