<?php

use Illuminate\Database\Seeder;
use Database\Seeders\FaqsSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\DonorSeeder;
use Database\Seeders\DoctorSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\RoleUserSeeder;
use Database\Seeders\GalleriesSeeder;
use Database\Seeders\BloodgroupSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\AppsCountrySeeder;
use Database\Seeders\DonateBloodSeeder;
use Database\Seeders\DonorDetailSeeder;
use Database\Seeders\GalleryDetailsSeeder;
use Database\Seeders\PermissionRoleSeeder;
use Database\Seeders\DoctorDesignationsSeeder;
use Database\Seeders\DoctorSpecialitiesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(PermissionRoleSeeder::class);

        $this->call(DoctorSpecialitiesSeeder::class);
        $this->call(DoctorDesignationsSeeder::class);

        $this->call(DoctorSeeder::class);
        $this->call(DonateBloodSeeder::class);
        $this->call(DonorSeeder::class);
        $this->call(DonorDetailSeeder::class);

        $this->call(BloodgroupSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(AppsCountrySeeder::class);
        $this->call(CategorySeeder::class);


        $this->call(FaqsSeeder::class);
        $this->call(GalleriesSeeder::class);
        $this->call(GalleryDetailsSeeder::class);
        $this->call(LinksSeeder::class);
    }
}
