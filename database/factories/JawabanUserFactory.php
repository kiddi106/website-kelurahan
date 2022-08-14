<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JawabanUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>mt_rand(1,4),
            'kuis_id'=>mt_rand(1,2),
            'jawaban'=> $this->faker->name(),
        ];
    }
}
