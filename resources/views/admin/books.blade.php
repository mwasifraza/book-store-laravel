@extends('partials.template')

@push('title')
Available Books | Book Store 
@endpush

@section('main')
<div class="row">
    <div class="col-sm-10 mx-auto">
        <div class="d-flex flex-direction-row">
            <div class="border d-flex justify-content-center align-items-center rounded-circle overflow-hidden" style="width: 75px; height: 75px;">
                <img src="{{ asset(auth()->user()->avatar) }}" alt="User" class="w-100">
            </div>
            <div class="ms-3 d-flex align-items-center">
                <div>
                    <h4 class="m-0">{{ auth()->user()->fullname }}</h4>
                    <h6 class="text-muted m-0">{{ '@'.auth()->user()->username }}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto col-sm-10 p-3">
        <div class="card">
            <div class="card-body">
                <h4 class="text-uppercase border-start border-5 border-warning ps-3">Books</h4>
                <hr>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <form action="{{ route('admin.books.page') }}" class="d-flex align-items-center">
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <input type="search" name="search" class="form-control form-control-sm" placeholder="Search Books">
                        <button class="btn btn-secondary btn-sm ms-2">Search</button>
                    </form>
                    <a href="{{ route('admin.book.add.page') }}" class="btn btn-warning px-5">Add Books</a>
                </div>
                
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                {{-- <th scope="col">Description</th> --}}
                                <th scope="col">Category</th>
                                <th scope="col">Author</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($books[0]))
                                @foreach ($books as $book)
                                    <tr class="text-center">
                                        <td scope="row">{{ $book->id }}</td>
                                        <td scope="row">{{ $book->title }}</td>
                                        {{-- <td scope="row">{{ $book->description }}</td> --}}
                                        <td scope="row">
                                            @foreach ($book->categories_info as $category)
                                                {{ $category->category_name }}{{ $loop->last ? "" : "," }}
                                            @endforeach
                                        </td>
                                        <td scope="row">{{ $book->author }}</td>
                                        <td scope="row">{{ $book->price }}</td>
                                        <td>
                                            <a href="{{ route('admin.book.update.page', ['id' => $book->id]) }}" class="btn btn-sm btn-secondary">Update</a>
                                            <a href="{{ route('admin.book.remove.action', ['id' => $book->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>                                
                                @endforeach
                            @else
                                <tr class="text-center">
                                    <td class="text-muted" colspan="7">
                                        <h2>No Books to show!</h2>
                                    </td>                                    
                                </tr>     
                            @endif

                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $books->onEachSide('1')->links('vendor.pagination.simple-bootstrap-4') }}
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection