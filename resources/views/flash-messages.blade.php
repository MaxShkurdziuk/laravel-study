@if(session()->has('success'))
    <div class="alert alert-success w-50 row g-3">{{ session()->get('success') }}</div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger w-50 row g-3">{{ session()->get('error') }}</div>
@endif
