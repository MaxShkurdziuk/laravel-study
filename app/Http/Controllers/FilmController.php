<?php

namespace App\Http\Controllers;

use App\Http\Requests\Film\CreateRequest;
use App\Models\Actor;
use App\Models\Genre;
use App\Services\FilmService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Film\EditRequest;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function __construct(private FilmService $filmService)
    {
    }

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
        $user = $request->user();

        $film = $this->filmService->create($data, $user);

        session()->flash('success', 'Film added successfully!');
        return redirect()->route('movies.show', ['film' => $film->id]);
    }

    public function edit(Film $film, EditRequest $request)
    {
        $data = $request->validated();
        $this->filmService->edit($film, $data);

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
