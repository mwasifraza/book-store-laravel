@extends('partials.template')

@push('title')
Views | Book Store 
@endpush

@section('main')
<div class="row">
    <div class="col-sm-10 mx-auto">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Verified</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="">
                        <td scope="row">{{ $user->firstname }}</td>
                        <td scope="row">{{ $user->lastname }}</td>
                        <td scope="row">{{ $user->email }}</td>
                        <td scope="row">{{ $user->email_verified_at ? "Yes" : "-" }}</td>
                        <td scope="row">{{ $user->phone }}</td>
                        <td scope="row">{{ $user->username }}</td>
                        <td scope="row">{{ $user->role }}</td>
                        <td scope="row">{{ $user->gender }}</td>
                        <td scope="row"></td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection