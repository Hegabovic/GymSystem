<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training_session>
 */
class Training_sessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'gym_id'=>rand(1,10),
            'start_at'=>$this->faker->date(),
            'finish_at'=>$this->faker->date(),
        ];
    }
}
