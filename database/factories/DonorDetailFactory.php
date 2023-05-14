<?php

namespace Database\Factories;

use App\Models\DonorDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonorDetailFactory extends Factory
{
    protected $model = DonorDetail::class;

    public function definition()
    {

        return [
            'donor_id' => $this->faker->numberBetween(1, 100), // Replace with the appropriate donor ID range
            'school_name' => $this->faker->sentence,
            'school_passing_year' => $this->faker->numberBetween(2000, 2022),
            'school_passing_degree' => $this->faker->sentence,
            'school_passing_result' => $this->faker->randomFloat(2, 0, 100),
            'college_name' => $this->faker->sentence,
            'college_passing_year' => $this->faker->numberBetween(2000, 2022),
            'college_passing_degree' => $this->faker->sentence,
            'college_passing_result' => $this->faker->randomFloat(2, 0, 100),
            'university_name' => $this->faker->sentence,
            'university_department' => $this->faker->sentence,
            'university_passing_degree' => $this->faker->sentence,
            'university_passing_year' => $this->faker->numberBetween(2000, 2022),
            'university_passing_result' => $this->faker->randomFloat(2, 0, 100),
            'donor_father_name' => $this->faker->name,
            'donor_mother_name' => $this->faker->name,
            'donor_birth_place' => $this->faker->city,
            'donor_religion' => $this->faker->randomElement(['Islam', 'Christianity', 'Hinduism', 'Buddhism', 'Other']),
            'donor_is_physically_disabled' => $this->faker->randomElement(['Yes', 'No']),
            'donor_is_physically_problem' => $this->faker->paragraph,
            'donor_nationality' => $this->faker->country,
            'donor_birthcertificateno' => $this->faker->numerify('BCN###'),
            'donor_occupation' => $this->faker->jobTitle,
            'donor_nid' => $this->faker->numerify('NID#########'),
            'donor_emergency_contact_name' => $this->faker->name,
            'emergency_contact_phone' => $this->faker->phoneNumber,
        ];
    }
}
