@extends('partials.template')

@push('title')
Admin Dashboard | Book Store 
@endpush

@section('main')
<div class="row">
    <div class="">
        <h4>Admin Dashboard</h4>
        <h6>Welcome, {{ auth()->user()->firstname }}</h6>
    </div>
</div>
@endsection