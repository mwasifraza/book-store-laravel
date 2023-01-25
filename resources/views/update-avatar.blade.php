@extends('partials.template')

@push('title')
Upload Avatar | Book Store 
@endpush

@section('main')
<div class="row">
    <div class="col-sm-4 p-3">
        <div class="p-4 mt-3 mx-2 bg-light rounded">
            <h4 class="text-uppercase border-start border-5 border-warning ps-3">Update Display picture</h4>
            <hr>
            <div class="my-3 mx-auto border d-flex justify-content-center align-items-center" style="width: 200px; height: 200px;">
                <img src="{{ asset(auth()->user()->avatar) }}" alt="User" class="w-100">
            </div>
            <form action="{{ route('upload.action') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- avatar --}}
                <div class="mb-3">
                    <label for="" class="form-label">Select Avatar</label>
                    <input type="file" class="form-control" name="avatar">
                    <small class="form-text text-danger">
                        @error('avatar') {{ $message }} @enderror
                    </small>
                </div>

                {{-- submit button --}}
                <div class="d-grid mb-3">
                    <button class="btn btn-warning">Upload Profile</button>
                </div>
                
            </form>

            <form action="{{ route('remove.action') }}" method="POST">
                @csrf
                <div class="d-grid">
                    <button class="btn btn-secondary">Remove Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection