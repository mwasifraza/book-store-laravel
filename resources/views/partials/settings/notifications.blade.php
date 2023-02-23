<h4 class="text-uppercase border-start border-5 border-warning ps-3">Notification settings</h4>
<hr>
<form action="{{ route('update.notification', ['role' => auth()->user()->role]) }}" method="post" class="my-3">
    @csrf
    
    <div class="row">
        <div class="col-sm-6 mx-auto">
            {{-- username --}}
            <div class="mb-3">
                <label class="form-label">Mute Specific Notification</label>
                <select name="mute" class="form-select" id="specificNotifications">
                    <option value="">-- Select --</option>
                    <option value="1">New Book Notification</option>
                    <option value="2">Update Book Notification</option>
                </select>
                {{-- <small class="form-text text-danger">
                    @error('username') {{ $message }} <br> @enderror
                </small> --}}
            </div>

            <div class="mb-3 form-check ps-0">
                <input type="checkbox" name="mute" id="mute_all" value="0" onchange="disableSpecificSettings(this)">
                <label class="form-label" for="mute_all">Mute all Notification</label>
            </div>

            <div class="d-grid">
                <button class="btn btn-warning">Save Settings</button>
            </div>
        </div>
    </div>
</form>

<script>
    function disableSpecificSettings(e){
        const el = document.getElementById('specificNotifications');
       if(e.checked){
        el.value = "";
        el.setAttribute('disabled','disabled');
       }else{
        el.removeAttribute('disabled');
       }
    }
</script>