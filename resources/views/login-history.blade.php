@extends('start')

@section('title', 'Login History')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">User ID</th>
            <th scope="col">Login at</th>
            <th scope="col">From IP</th>
        </tr>
        </thead>
        <tbody>
        @foreach($logins as $login)
            <tr>
                <th scope="row">{{ $login->user_id }}</th>
                <td>{{ $login->created_at }}</td>
                <td>{{ $login->ip }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $logins->links() !!}
@endsection
