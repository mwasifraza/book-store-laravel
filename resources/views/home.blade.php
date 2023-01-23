@extends('partials.template')

@push('title')
Home | Book Store 
@endpush

@section('main')
<div class="row">
    <div class="col-sm-4">
        <div class="p-4 mt-3 rounded">
            <h4 class="text-uppercase border-start border-5 border-warning ps-3">Log into your account!</h4>
            <hr>
            <form action="{{ route('login.action') }}" method="POST">
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
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="">
                    <small class="form-text text-danger">
                        @error('password') {{ $message }} @enderror
                    </small>
                </div>

                {{-- submit button --}}
                <div class="d-grid">
                    <button class="btn btn-warning">Login</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection