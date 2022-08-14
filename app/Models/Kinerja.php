<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kinerja extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(CategoryPenilaian::class);
    }
    public function soal()
    {
        return $this->belongsTo(SoalKinerja::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
