<h4 class="text-uppercase border-start border-5 border-warning ps-3">Account settings</h4>
<hr>
<form action="" method="post" class="my-3">
    @csrf
    
    <div class="row">
        <div class="col-sm-6 mx-auto">
            {{-- email --}}
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                <small class="form-text text-danger">
                    @error('email') {{ $message }} @enderror
                </small>
            </div>

            {{-- username --}}
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                <small class="form-text text-danger">
                    @error('username') {{ $message }} @enderror
                </small>
            </div>

            <div class="d-grid">
                <button class="btn btn-warning">Update my Account</button>
            </div>
        </div>
    </div>
</form>