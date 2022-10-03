@extends('start')

@section('title', 'Show film')

@section('content')
    <div class="w-50 row g-3">
        <h3>{{ $film->name }} ({{ $film->year }})</h3>
        <p class="mb-1">Жанр:
            @foreach($film->genres as $genre)
                <span>{{ $genre->name }}</span>
            @endforeach
        </p>
        <p class="mb-1">Актёры:
            @foreach($film->actors as $actor)
                <span>{{ $actor->first_name }} {{ $actor->last_name }}</span>
            @endforeach
        </p>
        <h4>Добавил: {{ $film->user->name }} (ID: {{ $film->user->id }})</h4>
        <p>{!! nl2br(strip_tags($film->description)) !!}</p>
    </div>
@endsection
