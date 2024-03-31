<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand mb-0 h1"><i class="bi-hexagon-fill me-2"></i> Data
                Master</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <hr class="d-lg-none text-white-50">
                <ul class="navbar-nav flex-row flex-wrap">
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('employees.index') }}"
                            class="nav-link active">Employee List</a></li>
                </ul>
                <hr class="d-lg-none text-white-50">
                <a href="{{ route('profile') }}" class="btn
btn-outline-light my-2 ms-md-auto"><i
                        class="bi-person-circle me-1"></i> My Profile</a>
            </div>
        </div>
    </nav>
    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 col-xl-4 border">
                <div class="mb-3 text-center">
                    <i class="bi-person-circle fs-1"></i>
                    <h4>Edit Employee</h4>
                </div>
                <hr>
                <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input class="form-control @error('firstName') is-invalid @enderror" type="text"
                                name="firstName" id="firstName" value="{{ $employee->firstname }}"
                                placeholder="Enter First Name">
                            @error('firstName')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input class="form-control @error('lastName') is-invalid @enderror" type="text"
                                name="lastName" id="lastName" value="{{ $employee->lastname }}"
                                placeholder="Enter Last Name">
                            @error('lastName')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email"
                                name="email" id="email" value="{{ $employee->email }}" placeholder="Enter Email">
                            @error('email')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input class="form-control @error('age') is-invalid @enderror" type="number" name="age"
                                id="age" value="{{ $employee->age }}" placeholder="Enter Age">
                            @error('age')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="position" class="form-label">Position</label>
                            <select class="form-control @error('position') is-invalid @enderror" name="position"
                                id="position">
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}"
                                        {{ $employee->position_id == $position->id ? 'selected' : '' }}>
                                        {{ $position->name }}</option>
                                @endforeach
                            </select>
                            @error('position')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 d-grid">
                                <button type="submit" class="btn btn-primary btn-lg mt-3">Update</button> <!-- Tombol Update -->
                                <a href="{{ route('employees.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Back</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        @vite('resources/js/app.js')
</body>

</html>
