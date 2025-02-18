<?php

namespace Database\Factories;

use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition():array
    {
        return [
            'name' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'document' => $this->faker->unique()->numerify('########'),
            'birthdate' => $this->faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'), // Fecha de nacimiento entre 18 y 60 años atrás
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'obs' => $this->faker->text(200),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    /**
     * Indicate that the person has specific birthdate.
     *
     * @param  string  $birthdate
     * @return Factory
     */
    public function birthdate($birthdate):array
    {
        return $this->state(function (array $attributes) use ($birthdate) {
            return [
                'birthdate' => $birthdate,
            ];
        });
    }

    /**
     * Indicate that the person has specific document.
     *
     * @param  string  $document
     * @return Factory
     */
    public function document($document):array
    {
        return $this->state(function (array $attributes) use ($document) {
            return [
                'document' => $document,
            ];
        });
    }
}
