@extends('partials.template')

@push('title')
Register Yourself | Book Store 
@endpush

@section('main')
    <div class="row">
        <div class="col-sm-6">
            <div class="p-4 mt-3 rounded">
                <h4 class="text-uppercase border-start border-5 border-warning ps-3">Let us know you!</h4>
                <small>Please fill out the following fields to get yourself registered.</small>
                <hr>
                <form action="{{ route('register.action') }}" method="POST">
                    @csrf
                    {{-- name --}}
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
                            <small class="form-text text-danger">
                                @error('firstname') {{ $message }} @enderror
                            </small>
                          </div>
                          <div class="col-sm-6 mb-3">
                            <label for="" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">
                            <small class="form-text text-danger">
                                @error('lastname') {{ $message }} @enderror
                            </small>
                          </div>
                    </div>
    
                    {{-- email --}}
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        <small class="form-text text-danger">
                            @error('email') {{ $message }} @enderror
                        </small>
                    </div>
    
                    {{-- phone number --}}
                    <div class="row">
                        <div class="col-sm-3 mb-3">
                            <label for="" class="form-label">Country Code</label>
                            <select name="countrycode" 
                                    class="form-select @error('countrycode') {{ "border border-danger" }} @enderror" > 
                                <option value="">-- Select --</option>
                                <option value="+92">+92</option>
                            </select>
                        </div>
                        <div class="col-sm-9 mb-3">
                            <label for="" class="form-label">Phone </label>
                            <input type="number" class="form-control" name="phone" value="{{ old('phone') }}">
                            <small class="form-text text-danger">
                                @error('phone') {{ $message }} @enderror
                            </small>
                        </div>
                    </div>
    
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
    
                    {{-- gender --}}
                    <div class="mb-3">
                        <div>
                            <label for="" class="form-label">Gender</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div><br>
                        <small class="form-text text-danger">
                            @error('gender') {{ $message }} @enderror
                        </small>
                    </div>
    
                    {{-- submit button --}}
                    <div class="d-grid">
                        <button class="btn btn-warning">Submit</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection