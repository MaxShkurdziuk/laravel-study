@extends('start')

@section('title', 'Actors List')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Add at</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($actors as $actor)
        <tr>
            <th scope="row">{{ $actor->id }}</th>
            <td>{{ $actor->first_name }}</td>
            <td>{{ $actor->last_name }}</td>
            <td>{{ $actor->created_at?->format('d.m.y') }}</td>
            <td>
                <a href="{{ route('actors.show', ['actor' => $actor->id]) }}" class="btn btn-info">Info</a>
                <a href="{{ route('actors.edit.actor', ['actor' => $actor->id]) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('actors.delete', ['actor' => $actor->id]) }}" method="post">
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
    {!! $actors->links() !!}
@endsection
