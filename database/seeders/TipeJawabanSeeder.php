<?php

namespace Database\Seeders;

use App\Models\TipeJawaban;
use Illuminate\Database\Seeder;

class TipeJawabanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipeJawaban::create([
            'tipe'=> 'radio_opt'
        ]
    );
        TipeJawaban::create([
            'tipe'=> 'checkbox' 
        ]
    );
        TipeJawaban::create([
            'tipe'=> 'textfield_s' 
        ]
);
    }
}
