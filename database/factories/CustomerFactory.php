<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender=['male','female'];
        return [
            'user_id'=>$this->faker->unique()->numberBetween(1, User::count()),
            'n_id'=>$this->faker->numerify('################'),
            'birth_date'=>$this->faker->date(),
            'gender'=>$gender[rand(0,1)],
            'avatar_path'=>'default image'
        ];
    }
}
