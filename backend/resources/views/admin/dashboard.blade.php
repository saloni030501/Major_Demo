<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - RoomRover</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        .container {
            height: 100%;
            display: flex;
            flex-direction: column;
            margin-left: 0;
        }
        .row {
            flex: 1;
        }
        .col-md-4 {
            background-color: #f8f9fa;
            padding: 15px;
            border-right: 1px solid #ddd;
        }
        .col-md-8 {
            padding: 15px;
        }
        .btn {
            text-align: left;
            margin-bottom: 10px; /* Add margin between buttons */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-success">
        <div class="container d-flex justify-content-center">
            <span class="navbar-brand mb-0 h1">Admin Dashboard - RoomRover</span>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <button class="btn btn-primary w-100"  onclick="location.href = '{{ route('index') }}'">Dashboard</button> 
                <button class="btn btn-primary w-100" onclick="location.href = '{{ route('userlist') }}'">User Management</button>
                <button class="btn btn-primary w-100" onclick="location.href = '{{ route('hotellist') }}'">Hotel Management</button>
               
                <form action="{{ route('logout') }}" method="POST"> 
                    @csrf <button type="submit" class="btn btn-danger w-100 mt-3">Logout</button>
                </form>
            </div>
            
            <div class="col-md-8" id="componentResult">
                @yield('content')  
            </div>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
