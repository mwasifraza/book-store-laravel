@extends('partials.template')

@push('title')
Find your account | Book Store 
@endpush

@section('main')
<div class="row">
    <div class="col-sm-4">
        <div class="p-4 mt-3 rounded">
            <h4 class="text-uppercase border-start border-5 border-warning ps-3">Let's find your account!</h4>
            <p>Enter your email address to recieve password reset code.</p>
            <hr>
            <form action="{{ route('password.email') }}" method="POST">
                @csrf

                {{-- email --}}
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    <small class="form-text text-danger">
                        @error('email') {{ $message }} @enderror
                    </small>
                </div>

                {{-- submit button --}}
                <div class="d-grid">
                    <button class="btn btn-warning">Find my account</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection