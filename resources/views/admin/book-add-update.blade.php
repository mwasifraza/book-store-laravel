@extends('partials.template')

@push('title')
{{ $title }} | Book Store 
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
                <h4 class="text-uppercase border-start border-5 border-warning ps-3">{{ $title }}</h4>
                <hr>
                <form action="{{ $action }}" method="POST" class="px-5 py-3" enctype="multipart/form-data">
                    @csrf
                    {{-- title --}}
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $book->title ?? old('title') }}">
                        <small class="form-text text-danger">
                            @error('title') {{ $message }} @enderror
                        </small>
                    </div>

                    {{-- description --}}
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea type="text" class="form-control" name="description">{{ $book->description ?? old('description') }}</textarea>
                        <small class="form-text text-danger">
                            @error('description') {{ $message }} @enderror
                        </small>
                    </div>

                    {{-- category --}}
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <option value="">-- Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" 
                                    @if (isset($book))
                                        {{ $book->category === $category->id ? "selected" : "" }}
                                    @endif>

                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                        <small class="form-text text-danger">
                            @error('category') {{ $message }} @enderror
                        </small>
                    </div>

                    {{-- author --}}
                    <div class="mb-3">
                        <label for="" class="form-label">Author</label>
                        <input type="text" class="form-control" name="author" value="{{ $book->author ?? old('author') }}">
                        <small class="form-text text-danger">
                            @error('author') {{ $message }} @enderror
                        </small>
                    </div>

                    {{-- price --}}
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" value="{{ $book->price ?? old('price') }}">
                        <small class="form-text text-danger">
                            @error('price') {{ $message }} @enderror
                        </small>
                    </div>
                    
                    @if (isset($book->cover_photo))
                        <div class="text-center">
                            <img src="{{ asset($book->cover_photo) }}" alt="book cover" class="img-thumbnail" width="200">
                            <input type="hidden" name="cover_photo" value="{{ $book->cover_photo }}">
                        </div>             
                    @endif

                   {{-- cover --}}
                   <div class="mb-3">
                        <label for="" class="form-label">Select Cover Photo</label>
                        <input type="file" class="form-control" name="cover">
                        <small class="form-text text-danger">
                            @error('cover') {{ $message }} @enderror
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