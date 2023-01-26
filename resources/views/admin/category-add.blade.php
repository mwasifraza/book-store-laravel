@extends('partials.template')

@push('title')
Available Categories | Book Store 
@endpush

@section('main')
<div class="row">
    <div class="offset-sm-3 col-sm-6">
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
    <div class="mx-auto col-sm-6 p-3">
        <div class="card">
            <div class="card-body">
                <h4 class="text-uppercase border-start border-5 border-warning ps-3">Add a new category</h4>
                <hr>
                <form action="{{ route('admin.category.add.action') }}" method="POST" class="px-5 py-3">
                    @csrf
                    {{-- category --}}
                    <div class="mb-3">
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category_name" value="{{ old('category_name') }}">
                        <small class="form-text text-danger">
                            @error('category_name') {{ $message }} @enderror
                        </small>
                    </div>

                    {{-- submit button --}}
                    <div class="d-grid">
                        <button class="btn btn-warning">Add Category</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>
</div>
@endsection