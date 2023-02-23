@extends('partials.template')

@push('title')
User Settings | Book Store 
@endpush

@section('main')
<div class="row">
    <div class="col-sm-11 mx-auto">
        
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <div class="nav flex-column nav-pills me-3" id="tab" role="tablist" aria-orientation="vertical">

                            <button class="nav-link active" id="profile-tab" data-bs-toggle="pill" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>

                            <button class="nav-link" id="account-tab" data-bs-toggle="pill" data-bs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="false">Account Settings</button>
                            
                            <button class="nav-link" id="security-tab" data-bs-toggle="pill" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false">Security</button>

                            <button class="nav-link" id="notification-tab" data-bs-toggle="pill" data-bs-target="#notification" type="button" role="tab" aria-controls="notification" aria-selected="false">Notification</button>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="v-pills-tabContent">
                            
                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                @include('partials.settings.profile-form')
                            </div>

                            <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab" tabindex="0">
                                @include('partials.settings.account-form')
                            </div>

                            <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab" tabindex="0">
                                @include('partials.settings.security-form')
                            </div>

                            <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab" tabindex="0">
                                @include('partials.settings.notifications')
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
          
    </div>
</div>
@endsection