<?php

namespace App\Observers;

use App\Models\Movie;
use Illuminate\Support\Str;

class MovieObserver
{
    public function creating(Movie $movie){
        $movie->slug = Str::slug($movie->title);
    }
    /**
     * Handle the Movie "created" event.
     */
    public function created(Movie $movie): void
    {
        //
    }

    /**
     * Handle the Movie "updated" event.
     */
    public function updated(Movie $movie): void
    {
        //
    }

    /**
     * Handle the Movie "deleted" event.
     */
    public function deleted(Movie $movie): void
    {
        //
    }

    /**
     * Handle the Movie "restored" event.
     */
    public function restored(Movie $movie): void
    {
        //
    }

    /**
     * Handle the Movie "force deleted" event.
     */
    public function forceDeleted(Movie $movie): void
    {
        //
    }
}
