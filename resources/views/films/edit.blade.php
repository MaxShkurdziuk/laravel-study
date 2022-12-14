@extends('start')

@section('title', 'Edit Film')

@section('content')
    <div>
        <form action="{{ route('movies.edit', ['film' => $film->id]) }}" method="post">
            @csrf
            <div class="w-50 row g-3">
                <div class="col-sm-6">
                    <label for="name">{{ __('validation.attributes.name') }}</label>
                    <input value="{{ old('name', $film->name) }}" type="text" name="name"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <label for="year">{{ __('validation.attributes.year') }}</label>
                    <input value="{{ old('year', $film->year) }}" type="text" name="year"
                           class="form-control @error('year') is-invalid @enderror">
                    @error('year')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="">Genres</label>
                    @error('genres')
                    <div>{{ $message }}</div>
                    @enderror
                    @foreach($genres as $genre)
                        <div class="form-check">
                            <input type="checkbox" name="genres[]" value="{{ $genre->id }}" class="form-check-input"
                                   @if($film->genres->contains('id', $genre->id)) checked @endif
                            > {{ $genre->name }}
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="">{{ __('validation.attributes.actors') }}</label>
                    @error('actors')
                    <div>{{ $message }}</div>
                    @enderror
                    @foreach($actors as $actor)
                        <div class="form-check">
                            <input type="checkbox" name="actors[]" value="{{ $actor->id }}" class="form-check-input"
                                   @if($film->actors->contains('id', $actor->id)) checked @endif
                            > {{ $actor->first_name }} {{ $actor->last_name }}
                        </div>
                    @endforeach
                </div>

                <div class="mb-3">
                    <label for="description">{{__('validation.attributes.description') }}</label>
                    <textarea name="description" rows="3"
                              class="form-control @error('description') is-invalid @enderror">{{ old('description', $film->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="w-100 btn btn-primary btn-lg" type="submit">Edit a film</button>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger w-50 mt-2">Error was found!</div>
        @endif
    </div>
@endsection

