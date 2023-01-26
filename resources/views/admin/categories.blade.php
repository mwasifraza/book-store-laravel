@extends('partials.template')

@push('title')
Available Categories | Book Store 
@endpush

@section('main')
<div class="row">
    <div class="col-sm-10 mx-auto">
        <div class="d-flex flex-direction-row">
            <div class="border d-flex justify-content-center align-items-center rounded-circle" style="width: 75px; height: 75px;">
                <img src="{{ asset(auth()->user()->avatar) }}" alt="User" class="w-100">
            </div>
            <div class="ms-3 d-flex align-items-center">
                <div>
                    <h4 class="m-0">{{ auth()->user()->firstname." ".auth()->user()->lastname }}</h4>
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
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.category.add.page') }}" class="btn btn-warning mb-3 px-5">Add Category</a>
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
                                        <td scope="row">0</td>
                                        <td>
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
                
            </div>
        </div>
    </div>
</div>
@endsection