@extends('start')

@section('title', 'Add Actor')

@section('content')
    <div>
        <form action="{{ route('actors.add') }}" method="post">
            @csrf
            <div class="w-50 row g-3">
                <div class="col-sm-6">
                    <label for="first_name">{{ __('validation.attributes.first_name') }}</label>
                    <input value="{{ old('first_name') }}" type="text" name="first_name"
                           class="form-control @error('first_name') is-invalid @enderror">
                    @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <label for="last_name">{{ __('validation.attributes.last_name') }}</label>
                    <input value="{{ old('last_name') }}" type="text" name="last_name"
                           class="form-control @error('last_name') is-invalid @enderror">
                    @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-12">
                    <label for="middle_name">{{ __('validation.attributes.middle_name') }}</label>
                    <input value="{{ old('middle_name') }}" type="text" name="middle_name"
                           class="form-control @error('middle_name') is-invalid @enderror">
                    @error('middle_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <label for="birthday">{{ __('validation.attributes.birthday') }}</label>
                    <input value="{{ old('birthday') }}" type="date" name="birthday"
                           class="form-control @error('birthday') is-invalid @enderror">
                    @error('birthday')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-6">
                    <label for="height">{{ __('validation.attributes.height') }}</label>
                    <input value="{{ old('height') }}" type="text" name="height"
                           class="form-control @error('height') is-invalid @enderror">
                    @error('height')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="w-100 btn btn-primary btn-lg" type="submit">Add an actor</button>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger w-50 mt-2">Error was found!</div>
        @endif
    </div>
@endsection
