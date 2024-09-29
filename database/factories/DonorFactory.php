<?php

// database/factories/DonorFactory.php
namespace Database\Factories;

use App\Models\Donor;
use App\Models\User;
use App\Models\Hospital; 
use Illuminate\Database\Eloquent\Factories\Factory;

class DonorFactory extends Factory
{
    protected $model = Donor::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id, // Get a valid user ID
            'hospital_id' => Hospital::inRandomOrder()->first()->id, 
            'blood_group' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'age' => $this->faker->numberBetween(18, 60),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'phone_number' => $this->faker->phoneNumber,
            'last_donation_date' => $this->faker->date(),
        ];
    }
}
