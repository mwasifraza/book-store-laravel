<h4 class="text-uppercase border-start border-5 border-warning ps-3">Profile settings</h4>
<hr>
<form action="{{ route('update.profile') }}" method="post" class="my-3">
    @csrf
    
    <div class="row">
        <div class="col-sm-6 mx-auto">
            {{-- name --}}
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}">
                <small class="form-text text-danger">
                    @error('firstname') {{ $message }} @enderror
                </small>
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">
                <small class="form-text text-danger">
                    @error('lastname') {{ $message }} @enderror
                </small>
            </div>
            {{-- phone number --}}
            <div class="mb-3">
                <label for="" class="form-label">Country Code</label>
                <select name="countrycode" 
                        class="form-select @error('countrycode') {{ "border border-danger" }} @enderror "> 

                    <option value="">-- Select --</option>
                    <option value="+92" selected>+92</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Phone </label>
                <input type="number" class="form-control" name="phone" value="{{ substr($user->phone, 3) }}">
                <small class="form-text text-danger">
                    @error('phone') {{ $message }} @enderror
                </small>
            </div>
            <div class="d-grid">
                <button class="btn btn-warning">Update Profile</button>
            </div>
        </div>
    </div>
</form>