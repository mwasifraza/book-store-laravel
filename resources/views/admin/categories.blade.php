@extends('partials.template')

@push('title')
Available Categories | Book Store 
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
                <h4 class="text-uppercase border-start border-5 border-warning ps-3">Categories</h4>
                <hr>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <form action="{{ route('admin.categories.page') }}" class="d-flex align-items-center">
                        <input type="search" name="search" class="form-control form-control-sm" placeholder="Search Category">
                        <button class="btn btn-secondary btn-sm ms-2">Search</button>
                    </form>
                    <a href="{{ route('admin.category.add.page') }}" class="btn btn-warning px-5">Add Category</a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th scope="col">ID</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">No. of Books</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($categories[0]))
                                @foreach ($categories as $category)
                                    <tr class="text-center">
                                        <td scope="row">{{ $category->id }}</td>
                                        <td scope="row">{{ $category->category_name }}</td>
                                        <td scope="row">{{ count($category->books) }}</td>
                                        <td>
                                            <a href="{{ route('admin.books.page', ['category' => $category->id]) }}" class="btn btn-sm btn-secondary">View Books</a>
                                            <a href="{{ route('admin.category.update.page', ['id' => $category->id]) }}" class="btn btn-sm btn-secondary">Update</a>
                                            <a href="{{ route('admin.category.remove.action', ['id' => $category->id]) }}" class="btn btn-sm btn-danger">Remove</a>
                                        </td>
                                    </tr>                                
                                @endforeach
                            @else
                                <tr class="text-center">
                                    <td class="text-muted" colspan="4">
                                        <h2>No Categories to show!</h2>
                                    </td>                                    
                                </tr>     
                            @endif                            
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $categories->onEachSide('1')->links('vendor.pagination.simple-bootstrap-4') }}
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection