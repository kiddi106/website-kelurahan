<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Kuis extends Model
{
    use HasFactory;
    protected $table = "kuis";
    protected $fillable = ['soal','name_file'];
    
    public function tipesoals(){
        return $this->belongsTo(TipeSoal::class);
    }

    public function jawabans(){
        return $this->hasMany(Jawaban::class);
    }

    public function jawabanuser(){
        return $this->hasMany(JawabanUser::class);
    }
}
