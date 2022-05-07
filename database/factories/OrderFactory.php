<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Gym;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'pkg_id'=>$this->faker->numberBetween(1, Package::count()),
            'customer_id'=>$this->faker->numberBetween(1, Customer::count()),
            'gym_id'=>$this->faker->numberBetween(1, Gym::count()),
            'paid_price'=>$this->faker->numberBetween(1,1000),
            'remaining_sessions'=>$this->faker->numberBetween(1, 10),
        ];
    }
}
