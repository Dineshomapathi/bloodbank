<?php

// database/factories/ReceiverFactory.php
namespace Database\Factories;

use App\Models\Receiver;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReceiverFactory extends Factory
{
    protected $model = Receiver::class;

    public function definition()
    {
        return [
            'user_id' => rand(1, 5),
            'hospital_id' => rand(1, 5),
            'blood_group' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'age' => $this->faker->numberBetween(18, 60),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'phone_number' => $this->faker->phoneNumber,
            'required_date' => $this->faker->date(),
        ];
    }
}
