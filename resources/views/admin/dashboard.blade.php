@extends('partials.template')

@push('title')
Admin Dashboard | Book Store 
@endpush

@section('main')

<div class="row">
    <div class="col-sm-4 p-3">
        <div class="border d-flex justify-content-center align-items-center rounded-circle" style="width: 200px; height: 200px;">
            <a href="{{ route('upload.avatar', ['role' => auth()->user()->role]) }}">
                <img src="{{ asset($user->avatar) }}" alt="User" class="w-100">
            </a>
        </div>
        <br>
        <div>
            <h3>{{ $user->firstname." ".$user->lastname }} <small class="text-muted">({{ '@'.$user->username }})</small></h3>
        </div>
    </div>
    <div class="col-sm-8 p-3">
        <div class="card">
            <div class="card-body">
                {{-- <nav class="navbar navbar-expand-lg bg-light">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/dashboard/books">Books</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Categories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Users</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav> --}}
            </div>
        </div>
    </div>
</div>
@endsection