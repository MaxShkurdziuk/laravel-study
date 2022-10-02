<?php

namespace App\Http\Controllers;

use App\Http\Requests\Actor\CreateRequest;
use App\Http\Requests\Actor\EditRequest;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function addActor()
    {
        return view('actors.add');
    }

    public function editActor(Actor $actor)
    {
        return view('actors.edit', compact('actor'));
    }

    public function delete(Actor $actor)
    {
        $actor->delete();

        session()->flash('success', 'Actor deleted successfully!');
        return redirect()->route('actors.list');
    }

    public function add(CreateRequest $request)
    {
        $data = $request->validated();
        $actor = new Actor($data);

        $actor->save();

        session()->flash('success', 'Actor added successfully!');
        return redirect()->route('actors.list', ['actor' => $actor->id]);
    }

    public function edit(Actor $actor, EditRequest $request)
    {
        $data = $request->validated();
        $actor->fill($data);
        $actor->save();

        session()->flash('success', 'Actor edited successfully!');

        return redirect()->route('actors.list', ['actor' => $actor->id]);
    }

    public function list(Request $request)
    {
        $actors = Actor::query()->paginate(3);

        return view('actors.list', ['actors' => $actors]);
    }

    public function show(Actor $actor)
    {
        return view('actors.show', compact('actor'));
    }
}
