@extends('admin.dashboard')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>RoomRover</h1>
        <p>Welcome Admin!!</p>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
    </div>
    <div class="col-md-4">
        <!-- New Section for Pending Requests -->
        <div class="card">
            <div class="card-header">
                Pending Requests
            </div>
            <div class="card-body">
                @if ($pendingRequests->count() > 0)
                <ul class="list-group">
                    @foreach ($pendingRequests as $user)
                    <li class="list-group-item">
                        {{ $user->full_name }} - {{ $user->created_at->diffForHumans() }}
                        <form method="POST" action="{{ route('admin.accept-request', $user->id) }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                        <form method="POST" action="{{ route('admin.reject-request', $user->id) }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </form>
                    </li>
                    @endforeach
                </ul>
                @else
                <p>No pending requests</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
