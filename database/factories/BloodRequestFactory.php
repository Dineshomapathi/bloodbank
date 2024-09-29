<?php

// database/factories/BloodRequestFactory.php
namespace Database\Factories;

use App\Models\BloodRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class BloodRequestFactory extends Factory
{
    protected $model = BloodRequest::class;

    public function definition()
    {
        return [
            'receiver_id' => rand(1, 10),
            'hospital_id' => rand(1, 5),
            'blood_group' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'quantity' => $this->faker->numberBetween(1, 5),
            'status' => 'pending',
        ];
    }
}
