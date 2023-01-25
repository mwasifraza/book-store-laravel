@extends('partials.template')

@push('title')
Admin Dashboard | Book Store 
@endpush

@section('main')
<div class="row">
    <div class="col-sm-4 p-3">
        <div class="border d-flex justify-content-center align-items-center" style="width: 200px; height: 200px;">
            <a href="{{ route('upload.avatar', ['role' => auth()->user()->role]) }}">
                <img src="{{ asset($user->avatar) }}" alt="User" class="w-100">
            </a>
        </div>
        <br>
        <div>
            <h3>{{ $user->firstname." ".$user->lastname }} <small class="text-muted">({{ '@'.$user->username }})</small></h3>
        </div>
    </div>
    <div class="col-sm-8 p-3">
        <div class="card">
            <div class="card-body"></div>
        </div>
    </div>
</div>
@endsection