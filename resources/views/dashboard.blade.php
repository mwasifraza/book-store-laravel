@extends('partials.template')

@push('title')
User Dashboard | Book Store 
@endpush

@section('main')
<div class="row">
    <div class="">
        <h4>User Dashboard</h4>
        <h6>Welcome, {{ auth()->user()->firstname }}</h6>
    </div>
</div>
@endsection