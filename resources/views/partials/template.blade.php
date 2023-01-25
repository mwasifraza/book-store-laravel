<!doctype html>
<html lang="en">

<head>
<title>@stack('title')</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS v5.2.1 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
{{-- CSS --}}
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    .nav-pills .nav-link{
        color: rgba(var(--bs-dark-rgb));
    }
    .nav-pills .nav-link:hover{
        color: rgba(var(--bs-dark-rgb));
    }
    .nav-pills .nav-link.active{
        color: rgba(var(--bs-dark-rgb)) !important;
        background-color: rgba(var(--bs-warning-rgb)) !important;
    }
</style>
</head>
<body>

{{-- header/navbar --}}
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Online Book Store</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/" aria-current="page">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/view">View</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Notification</a>
                </li>
                @if(auth()->check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="{{ route('settings', ['role' => auth()->user()->role]) }}">Settings</a>
                        <a class="dropdown-item" href="#">Help</a>
                        <a class="dropdown-item" href="{{ route('logout', ['role' => auth()->user()->role]) }}">Logout</a>
                    </div>
                </li>
                @endif
            </ul>
            {{-- <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                </li>
            </ul> --}}
        </div>
    </div>
</nav>


{{-- main container --}}
<div class="container py-4">
    @yield('main')
</div>


<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
</body>
</html>