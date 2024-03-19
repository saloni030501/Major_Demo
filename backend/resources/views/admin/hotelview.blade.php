@extends('admin.dashboard')

@section('content')
<h1>RoomRover<h1>
        <p>Hotels Available In Websites</p>

        <br>
        <a href="{{ route('addhotel') }}"><button type="button" class="btn btn-success">Add New Hotel</button></a>
        <br>
        <h2>List Of Hotels</h2>

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Rooms Availables</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->city }}</td>
                    <td>{{ $hotel->address }}</td>
                    <td>{{ $hotel->rooms }}</td>
                    <td>
                        <form action="{{ route('hotel.destroy',$hotel->id )}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mr-1">Delete</button>
                        </form>
                        <a href="{{ route('hotel.update', $hotel->id) }}" class="btn btn-primary">Update</a> <!-- Update button -->
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">No Hotel found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @endsection