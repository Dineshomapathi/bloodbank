<?php

// database/factories/BloodDonationFactory.php
namespace Database\Factories;

use App\Models\BloodDonation;
use Illuminate\Database\Eloquent\Factories\Factory;

class BloodDonationFactory extends Factory
{
    protected $model = BloodDonation::class;

    public function definition()
    {
        return [
            'donor_id' => rand(1, 20),
            'hospital_id' => rand(1, 5),
            'blood_group' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'quantity' => $this->faker->numberBetween(1, 5),
            'donation_date' => $this->faker->date(),
        ];
    }
}
