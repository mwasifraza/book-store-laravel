@extends('partials.template')

@push('title')
{{ $title }} | Book Store 
@endpush

@section('main')
<div class="row">
    <div class="offset-sm-3 col-sm-6">
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
    <div class="mx-auto col-sm-6 p-3">
        <div class="card">
            <div class="card-body">
                <h4 class="text-uppercase border-start border-5 border-warning ps-3">{{ $title }}</h4>
                <hr>
                <form action="{{ $action }}" method="POST" class="px-5 py-3">
                    @csrf
                    {{-- category --}}
                    <div class="mb-3">
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category_name" 
                               value="{{ $category->category_name ?? old('category_name') }}">
                        <small class="form-text text-danger">
                            @error('category_name') {{ $message }} @enderror
                        </small>
                    </div>

                    {{-- submit button --}}
                    <div class="d-grid">
                        <button class="btn btn-warning">{{ $btn }}</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>
</div>
@endsection