<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class TipeSoal extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['id','user_id', 'title',  'description', 'start', 'end'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function kuis(){
        return $this->hasMany(Kuis::class);
    }
    public function jawabanuser(){
        return $this->hasMany(JawabanUser::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
