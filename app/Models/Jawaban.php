<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;
    protected $table = "jawabans";
    protected $fillable = ['kuis_id','tipe_jawaban_id','jawaban'];

    public function kuis(){
        return $this->belongsTo(Kuis::class);
    }
    public function tipe_jawaban(){
        return $this->belongsTo(TipeJawaban::class);
    }
    public function jawaban_users(){
        return $this->hasMany(JawabanUser::class);
    }


}
