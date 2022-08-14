<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JawabanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kuis_id'=>mt_rand(1,2),
            'tipe_jawaban_id'=>'1',
            'jawaban'=> $this->faker->name(),
            
        ];
    }
}
