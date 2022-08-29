@if(session()->has('success'))
    <div class="alert alert-success w-50 row g-3">{{ session()->get('success') }}</div>
@endif
