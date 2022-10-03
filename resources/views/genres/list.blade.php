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
        @foreach($genres as $genre)
        <tr>
            <th scope="row">{{ $genre->id }}</th>
            <td>{{ $genre->name }}</td>
            <td>{{ $genre->created_at?->format('d.m.y') }}</td>
            <td>
                <a href="{{ route('genres.edit.genre', ['genre' => $genre->id]) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('genres.delete', ['genre' => $genre->id]) }}" method="post">
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
    {!! $genres->links() !!}
@endsection
