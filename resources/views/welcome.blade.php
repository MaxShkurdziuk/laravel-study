@extends('start')

@section('title', 'Main')

@section('content')
    <div class="row mt-4">
        <div class="col-md-8">
            @if($films->isEmpty())
                <h2>Films not found</h2>
            @endif
            @foreach($films as $film)
                <article class="mb-3">
                    <h2 class="mb-1">{{ $film->name }} ({{ $film->year }})</h2>
                    <p class="mb-1">
                        @foreach($film->genres as $genre)
                            <span>{{ $genre->name }}</span>
                        @endforeach
                    </p>
                </article>
            @endforeach
            <div class="d-flex justify-content-center">
                {!! $films->links() !!}
            </div>
        </div>
        <div class="col-md-4">
            <ul class="list-unstyled d-flex justify-content-start">
                <form action="{{ route('main') }}">
                    <div class="input-group">
                        <input class="form-control mb-2" type="text" placeholder="Title" name="name"
                               value="{{ request()->get('name') }}">
                    </div>
                    <div class="input-group">
                        <input class="form-control mb-2" type="text" placeholder="Year of issue" name="year"
                               value="{{ request()->get('year') }}">
                    </div>
                    <label for="genres">{{ __('validation.attributes.genres') }}</label>
                    @foreach($genres as $genre)
                        <div class="form-check">
                            <input type="checkbox"
                                   name="genres[]"
                                   value="{{ $genre->id }}"
                                   @if(in_array($genre->id, request()->get('genres', [])))
                                   checked
                                @endif
                            > {{ $genre->name }}
                        </div>
                    @endforeach

                    <label for="actors">{{ __('validation.attributes.actors') }}</label>
                    @foreach($actors as $actor)
                        <div class="form-check">
                            <input type="checkbox"
                                   name="actors[]"
                                   value="{{ $actor->id }}"
                                   @if(in_array($actor->id, request()->get('actors', [])))
                                   checked
                                @endif
                            > {{ $actor->first_name }} {{ $actor->last_name }}
                        </div>
                    @endforeach

                    <button class="btn btn-primary">Search</button>
                </form>
            </ul>
        </div>
    </div>
@endsection
