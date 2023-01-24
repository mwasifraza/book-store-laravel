<h4 class="text-uppercase border-start border-5 border-warning ps-3">Security settings</h4>
<hr>
<form action="" method="post" class="my-3">
    @csrf
    
    <div class="row">
        <div class="col-sm-6 mx-auto">
            {{-- password --}}
            <div class="mb-3">
                <label class="form-label">Current Password</label>
                <input type="password" class="form-control" name="password" >
                <small class="form-text text-danger">
                    @error('password') {{ $message }} @enderror
                </small>
            </div>

            {{-- new password --}}
            <div class="mb-3">
                <label class="form-label">New Password</label>
                <input type="password" class="form-control" name="new_password" >
                <small class="form-text text-danger">
                    @error('new_password') {{ $message }} @enderror
                </small>
            </div>

            <div class="d-grid">
                <button class="btn btn-warning">Change Password</button>
            </div>
        </div>
    </div>
</form>