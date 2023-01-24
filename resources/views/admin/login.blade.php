@extends('partials.template')

@push('title')
Admin Panel | Book Store 
@endpush

@section('main')
<div class="row">
    <div class=" mx-auto col-sm-4">
        <div class="p-4 mt-5 mx-4 bg-light rounded ">
            <h4 class="text-uppercase border-start border-5 border-warning ps-3">Welcome to Admin Portal</h4>
            <hr>
            <form action="{{ route('admin.login') }}" method="POST">
                @csrf

                {{-- username --}}
                <div class="mb-3">
                    <label for="" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                    <small class="form-text text-danger">
                        @error('username') {{ $message }} @enderror
                    </small>
                </div>

                {{-- password --}}
                <div class="mb-2">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="">
                    <small class="form-text text-danger">
                        @error('password') {{ $message }} @enderror
                    </small>
                </div>

                <div class="d-flex justify-content-end mb-4">
                    <a href="{{ route('password.request') }}" class="text-dark text-decoration-none">Forget Password</a>
                </div>

                {{-- submit button --}}
                <div class="d-grid">
                    <input type="submit" value="Login" class="btn btn-warning">
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection