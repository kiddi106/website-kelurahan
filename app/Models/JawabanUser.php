<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class JawabanUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function tipe_soal(){
        return $this->belongsTo(TipeSoal::class);
    }
    public function kuis(){
        return $this->belongsTo(Kuis::class);
    }
    public function jawaban(){
        return $this->belongsTo(jawaban::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
   
}
