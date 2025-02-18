<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class BranchFactory extends Factory
{
    protected $model = Branch::class;

    public function definition():array
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'city_id' => City::inRandomOrder()->first()->id,
            'hours' => $this->faker->word,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
