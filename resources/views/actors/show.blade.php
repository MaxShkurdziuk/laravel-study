@extends('start')

@section('title', 'Show film')

@section('content')
    <div class="w-50 row g-3">
        <h3>{{ $actor->first_name }} {{ $actor->middle_name }} {{ $actor->last_name }}</h3>
        <h4>{{ $actor->bithday }}</h4>
        <h4>Рост: {{ $actor->height }}</h4>
    </div>
@endsection
