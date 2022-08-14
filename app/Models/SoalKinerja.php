<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalKinerja extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function kinerja(){
        return $this->hasMany(Kinerja::class);
    }
}
