@extends('partials.template')

@push('title')
Reset your password | Book Store 
@endpush

@section('main')
<div class="row">
    <div class="col-sm-4">
        <div class="p-4 mt-3 mx-3 bg-light rounded">
            <h4 class="text-uppercase border-start border-5 border-warning ps-3">Reset Your Password!</h4>
            <p>Enter your email address to recieve password reset code.</p>
            <hr>
            <form action="{{ route('password.update') }}" method="POST">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                {{-- password --}}
                <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                    <small class="form-text text-danger">
                        @error('password') {{ $message }} @enderror
                    </small>
                </div>
                
                {{-- confirm password --}}
                <div class="mb-3">
                    <label for="" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
                    <small class="form-text text-danger">
                        @error('password_confirmation') {{ $message }} @enderror
                    </small>
                </div>

                {{-- submit button --}}
                <div class="d-grid">
                    <button class="btn btn-warning">Reset Password</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection