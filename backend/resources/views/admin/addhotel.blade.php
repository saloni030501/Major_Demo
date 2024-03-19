@extends('admin.dashboard')
@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<h1>Welcome Admin! Add a new Hotel</h1> <!-- Heading added here -->

<form action="{{ route('hotel.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="city" class="form-label">City</label>
        <input type="text" class="form-control" id="city" name="city" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <div class="mb-3">
        <label for="rooms" class="form-label">Rooms Available</label>
        <input type="number" class="form-control" id="rooms" name="rooms" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Hotel</button>
</form>
@endsection
