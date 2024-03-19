@extends('admin.dashboard')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<h1>Welcome Admin! Update Hotel</h1> <!-- Updated heading -->

<form action="{{ route('hotel_update', $hotel->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Use PUT method for updating -->
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $hotel->name }}" required>
    </div>
    <div class="mb-3">
        <label for="city" class="form-label">City</label>
        <input type="text" class="form-control" id="city" name="city" value="{{ $hotel->city }}" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ $hotel->address }}" required>
    </div>
    <div class="mb-3">
        <label for="rooms" class="form-label">Rooms Available</label>
        <input type="number" class="form-control" id="rooms" name="rooms" value="{{ $hotel->rooms }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Hotel</button>
</form>
@endsection
