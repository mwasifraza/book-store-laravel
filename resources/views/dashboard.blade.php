@extends('partials.template')

@push('title')
User Dashboard | Book Store 
@endpush

@section('main')
<div class="row">
    <div class="col-sm-4 p-3">
        <div class="border d-flex justify-content-center align-items-center rounded-circle overflow-hidden" style="width: 200px; height: 200px;">
            <a href="{{ route('upload.avatar', ['role' => auth()->user()->role]) }}">
                <img src="{{ asset(auth()->user()->avatar) }}" alt="User" class="w-100">
            </a>
        </div>
        <br>
        <div>
            <h3>{{ auth()->user()->firstname." ".auth()->user()->lastname }} <small class="text-muted">({{ '@'.auth()->user()->username }})</small></h3>
        </div>
    </div>
    <div class="col-sm-8 p-3">
        @if (isset($categories[0]))
            <nav class="navbar navbar-expand-lg bg-light navbar-light mb-4">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                        <ul class="navbar-nav">
                            @foreach ($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.dashboard', ['cat' => $category->id]) }}">
                                        {{ $category->category_name }}
                                    </a>
                                </li>                            
                            @endforeach
                        </ul>
                    </div>
                </div>
            </nav>
        @endif

        @if (isset($books[0]))
            @foreach ($books as $book)
                <div class="card mb-3">
                    <div class="card-body bg-light d-flex">
                        <div class="bg-white d-flex justify-content-center align-items-center" style="width: 180px; height:180px;">
                            <img src="{{ asset($book->cover_photo) }}" alt="book cover" class="w-100">
                        </div>
                        <div class="ms-3 w-75">
                            <h4 class="m-0">{{ $book->title }}</h4>
                            <div class="h6">
                                <span class="me-2">
                                    <i class="fa-solid fa-tag text-muted"></i>&nbsp; 
                                    <a href="" class="text-decoration-none text-muted fw-normal">{{ $book->category_info->category_name }}</a>
                                </span>
                                <span class="me-2">
                                    <i class="fa-solid fa-user text-muted"></i>&nbsp;
                                    <a href="" class="text-decoration-none text-muted fw-normal">{{ $book->author }}</a>
                                </span>
                                <span class="me-2">
                                    <i class="fa-solid fa-calendar text-muted"></i>&nbsp;
                                    <a href="" class="text-decoration-none text-muted fw-normal">{{ $book->created_at->format("d-m-Y") }}</a>
                                </span>
                            </div>
                            <div class="mt-3">
                                <p>{{ substr($book->description, 0 , 200)."..." }}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="text-muted">Rs. {{ $book->price }}</h5>
                                <div>
                                    <button class="btn btn-secondary btn-sm px-4">Buy Now</button>
                                    <button class="btn btn-secondary btn-sm px-4 ms-2">Read More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            @endforeach
        @else
            <div class="card">
                <div class="card-body">
                    <h1 class="text-muted text-center">No Book Found.</h1>
                </div>
            </div>
        @endif
            

        <div class="d-flex justify-content-center">
            {{ $books->onEachSide('1')->links('vendor.pagination.simple-bootstrap-4') }}
        </div>
    </div>
</div>
@endsection