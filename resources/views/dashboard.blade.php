@extends('partials.template')

@push('title')
User Dashboard | Book Store 
@endpush

@section('main')
<div class="row">
    <div class="">
        <h4>Dashboard</h4>
        <h6>Welcome, {{ auth()->user()->firstname ?? "Guest" }}</h6>
    </div>
</div>
@endsection