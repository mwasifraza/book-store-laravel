@extends('partials.template')

@push('title')
Please Verify Email | Book Store 
@endpush

@section('main')
<div class="d-flex justify-content-center align-items-center" style="height: 75vh;">
    <div class="text-center">
        <h1 class="text-uppercase">Please verify your email first!</h1>
        <p>A verification email has been sent to your email address, if you did not recieve any email please click the button below!</p>
        <form action="{{ route('verification.send') }}" method="POST">
            @csrf
            <button class="btn btn-warning px-5">Send Email Again</button>
        </form>
    </div>
</div>
@endsection