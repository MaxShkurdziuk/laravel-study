<?php

namespace App\Observers;

use App\Mail\UpdatedDate;
use App\Models\Film;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FilmObserver
{
    /**
     * Handle the Film "created" event.
     *
     * @param  \App\Models\Film  $film
     * @return void
     */
    public function created(Film $film)
    {
        //
    }

    /**
     * Handle the Film "updated" event.
     *
     * @param  \App\Models\Film  $film
     * @return void
     */
    public function updated(Film $film)
    {
        $isYearChanged = $film->year !== $film->getOriginal('year');

        if ($isYearChanged) {
            $users = User::all()->except($film->user_id);
            foreach ($users as $user) {
                Mail::to($user->email)->send(new UpdatedDate($film));
            }
        }
    }

    /**
     * Handle the Film "deleted" event.
     *
     * @param  \App\Models\Film  $film
     * @return void
     */
    public function deleted(Film $film)
    {
        //
    }

    /**
     * Handle the Film "restored" event.
     *
     * @param  \App\Models\Film  $film
     * @return void
     */
    public function restored(Film $film)
    {
        //
    }

    /**
     * Handle the Film "force deleted" event.
     *
     * @param  \App\Models\Film  $film
     * @return void
     */
    public function forceDeleted(Film $film)
    {
        //
    }
}
