<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;

/**
 * @extends Factory<Branch>
 */
class BranchFactory extends Factory
{
    protected $model = Branch::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'address' => $this->faker->streetAddress(),
            'city_id' => City::factory(),
            'hours' => $this->faker->randomElement(['9:00-18:00', '10:00-20:00', '8:00-17:00']),
            'phone' => $this->faker->phoneNumber(),
        ];
    }
}
