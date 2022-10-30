<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Film;
use App\Models\User;

class FilmService
{
    public function create(array $data, User $user): Film
    {
        $film = new Film($data);
        $film->user()->associate($user);
        $film->save();
        $film->genres()->attach($data['genres']);
        $film->actors()->attach($data['actors']);

        return $film;
    }

    public function edit(Film $film, array $data): void
    {
        $film->fill($data);
        $film->genres()->sync($data['genres']);
        $film->actors()->sync($data['actors']);
        $film->save();
    }

    public function delete(Film $film): void
    {
        $film->delete();
    }
}
