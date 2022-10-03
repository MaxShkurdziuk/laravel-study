@extends('start')

@section('title', 'Add Genre')

@section('content')
    <div>
        <form action="{{ route('genres.add') }}" method="post">
            @csrf
            <div class="w-50 row g-3">
                <div class="col-sm-6">
                    <label for="name">{{ __('validation.attributes.name') }}</label>
                    <input value="{{ old('name') }}" type="text" name="name"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-50 row g-3">
                    <button class="btn btn-primary btn-lg" type="submit">Add a genre</button>
                </div>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger w-50 mt-2">Error was found!</div>
        @endif
    </div>
@endsection
