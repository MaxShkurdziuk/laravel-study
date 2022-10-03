@extends('start')

@section('title', 'Show genre')

@section('content')
    <div class="w-50 row g-3">
        <h3>{{ $genre->name }}</h3>
    </div>
@endsection
