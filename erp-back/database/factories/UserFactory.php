<?php

namespace Database\Factories;

use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Src\Shared\Enums\RoleTypesEnum;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition():array
    {
        return [
            'person_id' => Person::factory(),
            'username' => $this->faker->unique()->userName,
            'password' => bcrypt('1234'),
            'last_login' => $this->faker->dateTimeThisYear,
            'active' => $this->faker->boolean,
            'role_id' => $this->faker->numberBetween(RoleTypesEnum::ADMINISTRADOR->value),
            'remember_token' => Str::random(10),
            'created_at' => $this->faker->dateTimeThisYear,
            'updated_at' => $this->faker->dateTimeThisYear,
        ];
    }

    /**
     * Indicate that the user is active.
     *
     * @return Factory
     */
    public function active():array
    {
        return $this->state(function (array $attributes) {
            return [
                'active' => true,
            ];
        });
    }

    /**
     * Indicate that the user is inactive.
     *
     * @return Factory
     */
    public function inactive():array
    {
        return $this->state(function (array $attributes) {
            return [
                'active' => false,
            ];
        });
    }
}
