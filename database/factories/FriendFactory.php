<?php

namespace Database\Factories;

use App\Models\Friend;
use Illuminate\Database\Eloquent\Factories\Factory;

class FriendFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Friend::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id_1' => $this->faker->numberBetween($min = 1, $max = 30),
            'user_id_2' => $this->faker->numberBetween($min = 1, $max = 30),
        ];
    }
}
