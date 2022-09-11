<?php

namespace App\Http\Controllers;

use App\Http\Requests\Film\CreateRequest;
use App\Http\Requests\Film\DeleteRequest;
use App\Http\Requests\Film\EditRequest;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function addFilm()
    {
        return view('films.add');
    }

    public function editFilm(Film $film)
    {
        return view('films.edit', compact('film'));
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

        $film->save();

        session()->flash('success', 'Film added successfully!');
        return redirect()->route('movies.show', ['film' => $film->id]);
    }

    public function edit(Film $film, EditRequest $request)
    {
        $data = $request->validated();
        $film->fill($data);
        $film->save();

        session()->flash('success', 'Film edited successfully!');

        return redirect()->route('movies.show', ['film' => $film->id]);
    }

    public function list(Request $request)
    {
        $films = Film::query()->paginate(4);

        return view('films.list', ['films' => $films]);
    }

    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }
}
