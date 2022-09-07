@extends('start')

@section('title', 'Movies List')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Add at</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($films as $film)
        <tr>
            <th scope="row">{{ $film->id }}</th>
            <td>{{ $film->name }}</td>
            <td>{{ $film->created_at?->format('d.m.y') }}</td>
            <td>
                <a href="{{ route('movies.show', ['film' => $film->id]) }}" class="btn btn-info">Info</a>
                <a href="{{ route('movies.edit.film', ['film' => $film->id]) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('movies.delete', ['film' => $film->id]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {!! $films->links() !!}
@endsection
