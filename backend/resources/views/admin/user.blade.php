@extends('admin.dashboard')

@section('content')
<h1>RoomRover<h1>
<p>Welcome Admin!!</p>
<h2>Agents List</h2>
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
            <th>Email</th>
            <th>Contact Number</th>
            <th>Role</th>
            <th>Is_Approved</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($agents as $agent)
        <tr>
            <td>{{ $agent->id }}</td>
            <td>{{ $agent->full_name }}</td>
            <td>{{ $agent->email }}</td>
            <td>{{ $agent->contact }}</td>
            <td>{{ $agent->role }}</td>
            <td>{{ $agent->is_approved ? 'Yes' : 'No' }}</td>
            <td>
                <form action="{{ route('user.enable', $agent->id )}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">Enable</button>
                </form>

                <form action="{{ route('user.disable', $agent->id )}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-warning">Disable</button>
                </form>
                <form action="{{ route('user.destroy', $agent->id )}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">No agents found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection