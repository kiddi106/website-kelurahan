<?php

namespace Database\Seeders;

use App\Models\CategoryPenilaian;
use App\Models\Group;
use App\Models\Jawaban;
use App\Models\Kinerja;
use App\Models\Kuis;
use App\Models\SoalKinerja;
use App\Models\TipeJawaban;
use App\Models\TipeSoal;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminUserSeeder::class,
            TipeJawabanSeeder::class,
            TipeSoalSeeder::class,
            CompanySeeder::class,
            GroupSeeder::class
        ]);
        User::factory(3)->create();
        Kuis::factory(5)->create();
        Jawaban::factory(10)->create();

        SoalKinerja::create([
            'soal' => 'Disiplin Kehadiran'
        ]);
        SoalKinerja::create([
            'soal' => 'Tanggung Jawab Penyelesaian Pekerjaan'
        ]);
        SoalKinerja::create([
            'soal' => 'Kepatuhan Terhadap Kewajiban Larangan'
        ]);
        CategoryPenilaian::create([
            'type' => 'Baik'
        ]);
        CategoryPenilaian::create([
            'type' => 'Kurang baik'
        ]);


        

    }
}
