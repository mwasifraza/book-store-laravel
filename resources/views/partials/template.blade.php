<!doctype html>
<html lang="en">

<head>
<title>@stack('title')</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS v5.2.1 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
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
    .dropdown-menu.notification-menu{
        width: 360px;
    }
    .dropdown-menu.notification-menu::before{
        content: "";
        position: absolute;
        top: 0;
        left: 4px;
        width: 14px;
        height: 14px;
        background-color: white;
        transform: rotate(45deg) translateY(-50%);
    }
    .dropdown-menu.notification-menu .dropdown-item{
        white-space: normal;
    }
    .dropdown-item:active {
        background-color: unset;
        color: unset;
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
                @if(auth()->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route(auth()->user()->role.'.dashboard') }}" title="Dashboard">
                            <i class="fa-solid fa-house fa-lg"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Notification"><i class="fa-solid fa-bell fa-lg"></i>
                            @if(count(auth()->user()->unreadNotifications) > 0)
                                <span class="position-absolute top-10 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ count(auth()->user()->unreadNotifications) }}
                                </span>
                            @endif
                        </a>
                        {{-- notification dropdown menu --}}
                        <div class="dropdown-menu notification-menu dropdown-menu-start rounded-0" aria-labelledby="dropdownId">
                            @if(isset(auth()->user()->unreadNotifications[0]))
                                <span class="dropdown-header py-0 text-primary">Unread Notifications</span>
                                @foreach (auth()->user()->unreadNotifications as $notification)
                                    <a title="Mark as Read" class="dropdown-item @if(!$loop->last){{ "border-bottom" }}@endif" 
                                       href="{{ route('markAsRead', ['role' => auth()->user()->role, 'id' => $notification->id]) }}">
                                        {!! $notification->data['content'] !!}
                                        <br>
                                        <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                    </a>
                                @endforeach
                            @else
                                <span class="dropdown-item disabled">
                                    No new notification found
                                </span> 
                            @endif
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" title="Messages">
                            <i class="fa-solid fa-comment fa-lg"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->fullname }}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="{{ route('settings', ['role' => auth()->user()->role]) }}">Settings</a>
                            <a class="dropdown-item" href="#">Help</a>
                            <a class="dropdown-item" href="{{ route('logout', ['role' => auth()->user()->role]) }}">Logout</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.view') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register.view') }}">Register</a>
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
@if (auth()->check() && auth()->user()->role === "admin")
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-sm bg-warning rounded px-4 mx-2" href="{{ route('admin.books.page') }}">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-sm bg-warning rounded px-4 mx-2" href="{{ route('admin.categories.page') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-sm bg-warning rounded px-4 mx-2" href="{{ route('admin.users.page') }}">Users</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endif

<div class="container py-4">
    @yield('main')
</div>



<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
</body>
</html>