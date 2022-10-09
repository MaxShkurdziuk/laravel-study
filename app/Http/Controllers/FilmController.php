<?php

namespace App\Http\Controllers;

use App\Http\Requests\Film\CreateRequest;
use App\Models\Actor;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Film\EditRequest;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function addFilm()
    {
        $genres = Genre::all();
        $actors = Actor::all();

        return view('films.add', compact('genres', 'actors'));
    }

    public function editFilm(Film $film)
    {
        $genres = Genre::all();
        $actors = Actor::all();

        return view('films.edit', compact('film', 'genres', 'actors'));
    }

    public function delete(Film $film)
    {
        $film->delete();

        session()->flash('success', 'Film deleted successfully!');
        return redirect()->route('movies.list');
    }

    public function add(CreateRequest $request)
    {
        $data = $request->validated();
        $film = new Film($data);

        $user = $request->user();
        $film->user()->associate($user);

        $film->save();
        $film->genres()->attach($data['genres']);
        $film->actors()->attach($data['actors']);

        session()->flash('success', 'Film added successfully!');
        return redirect()->route('movies.show', ['film' => $film->id]);
    }

    public function edit(Film $film, EditRequest $request)
    {
        $data = $request->validated();
        $film->fill($data);
        $film->genres()->sync($data['genres']);
        $film->actors()->attach($data['actors']);
        $film->save();

        session()->flash('success', 'Film edited successfully!');

        return redirect()->route('movies.show', ['film' => $film->id]);
    }

    public function list(Request $request)
    {
        $films = Film::query()->paginate(3);

        return view('films.list', ['films' => $films]);
    }

    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }
}
