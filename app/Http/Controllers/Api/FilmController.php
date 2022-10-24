<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\CreateRequest;
use App\Http\Requests\Article\EditRequest;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use App\Services\FilmService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class FilmController extends Controller
{
    public function __construct(private FilmService $filmService)
    {
    }

    public function create(CreateRequest $request): FilmResource
    {
        $data = $request->validated();
        $user = $request->user();
        $film = $this->filmService->create($data, $user);

        return new FilmResource($film);
    }

    public function edit(Film $film, EditRequest $request): FilmResource
    {
        $data = $request->validated();
        $this->filmService->edit($film, $data);

        return new FilmResource($film);
    }

    public function list(): AnonymousResourceCollection
    {
        $films = Film::query()->with(['user', 'genres', 'actors'])->latest()->paginate(3);

        return FilmResource::collection($films);
    }

    public function show(Film $film): FilmResource
    {
        return new FilmResource($film);
    }

    public function delete(Film $film): Response
    {
        $this->filmService->delete($film);
        $data = [
            'message' => 'Film successfully deleted',
        ];

        return response($data, status: 204);
    }
}
