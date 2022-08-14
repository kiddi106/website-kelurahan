<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPenilaian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kinerja()
    {
        $this->hasMany(Kinerja::class);
    }
}
