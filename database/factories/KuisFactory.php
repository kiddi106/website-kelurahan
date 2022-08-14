<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KuisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>mt_rand(1,3),
            'tipe_soal_id'=>1,
            'soal'=>$this->faker->name(),
            'tipe_jawaban_id'=>1
        ];
    }
}
