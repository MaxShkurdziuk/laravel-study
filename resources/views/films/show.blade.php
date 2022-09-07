@extends('start')

@section('Title', 'Show film')

@section('content')
    <div class="w-50 row g-3">
        <h3>{{ $film->name }}</h3>
        <h4>{{ $film->year }}</h4>
        <p>{!! nl2br(strip_tags($film->description)) !!}</p>
    </div>
@endsection
