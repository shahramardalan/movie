<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieGenre extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function genre(){
        return $this->hasOne(Genre::class, 'id', 'genre_id');
    }
}
