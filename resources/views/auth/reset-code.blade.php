@extends('partials.template')

@push('title')
Verify Email | Book Store 
@endpush

@section('main')
<div class="row">
    <div class="col-sm-4">
        <div class="p-4 mt-3 mx-2 bg-light rounded">
            <h4 class="text-uppercase border-start border-5 border-warning ps-3">Found You!</h4>
            <p>4-digit code has been sent to your email address, <b>{{ $email }}</b></p>
            <hr>
            <form action="{{ route('password.verify.code') }}" method="POST">
                @csrf

                <input type="hidden" name="email" value="{{$email}}">

                {{-- code --}}
                <div class="mb-3">
                    <label for="" class="form-label">Code</label>
                    <input type="number" class="form-control" name="code" value="{{ old('code') }}">
                    <small class="form-text text-danger">
                        @error('code') {{ $message }} @enderror
                    </small>
                </div>

                {{-- submit button --}}
                <div class="d-grid">
                    <button class="btn btn-warning">Verify</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection