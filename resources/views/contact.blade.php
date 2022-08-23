@extends('start')

@section('title', 'Contact us')

@section('content')
    <div class="w-50 row g-3">
        <div class="col-sm-6">
            <label for="name" class="form-label">Name</label>
            <input type="{{ old('title') }}" class="form-control" id="firstName" placeholder="" value="" required="">
            <div class="invalid-feedback">
                Valid name is required.
            </div>
        </div>

        <div class="col-sm-6">
            <label for="mobilePhone" class="form-label">Mobile phone</label>
            <input type="{{ old('title') }}" class="form-control" id="mobilePhone" placeholder="" value="" required="">
            <div class="invalid-feedback">
                Valid mobile phone is required.
            </div>
        </div>

        <div class="col-12 mb-2">
            <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com">
            <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button class="w-100 btn btn-primary btn-lg" type="submit">Send a message</button>
    </div>
@endsection

