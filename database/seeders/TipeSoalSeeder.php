<?php

namespace Database\Seeders;

use App\Models\TipeSoal;
use Illuminate\Database\Seeder;

class TipeSoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       TipeSoal::create([
           'user_id'=> 1,
           'title'=> 'Survey Sistem Kenyamanan Pengguna',
           'slug' => 'survey-sistem-kenyamanan-pengguna',
           'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, sequi eius!',
           'start' => date('2022-02-27'),
           'end' => date('2022-05-27')
            
       ]);

    }
}
