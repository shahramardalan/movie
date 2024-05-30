<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MovieImage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getImageAttribute($image){
        return Storage::temporaryUrl($image, now()->addDays(365));
    }
}
