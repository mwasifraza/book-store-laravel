@extends('partials.template')

@push('title')
Registered Users | Book Store 
@endpush

@section('main')
<div class="row">
    <div class="col-sm-10 mx-auto">
        <div class="d-flex flex-direction-row">
            <div class="border d-flex justify-content-center align-items-center rounded-circle overflow-hidden" style="width: 75px; height: 75px;">
                <img src="{{ asset(auth()->user()->avatar) }}" alt="User" class="w-100">
            </div>
            <div class="ms-3 d-flex align-items-center">
                <div>
                    <h4 class="m-0">{{ auth()->user()->firstname." ".auth()->user()->lastname }}</h4>
                    <h6 class="text-muted m-0">{{ '@'.auth()->user()->username }}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto col-sm-10 p-3">
        <div class="card">
            <div class="card-body">
                <h4 class="text-uppercase border-start border-5 border-warning ps-3">Registered Users</h4>
                <hr>
                <div class="d-flex justify-content-end">
                    {{-- <a href="#" class="btn btn-warning mb-3 px-5">Add User</a> --}}
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Verified</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Username</th>
                                <th scope="col">Role</th>
                                <th scope="col">Gender</th>
                                {{-- <th scope="col">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($users[0]))
                                @foreach ($users as $user)
                                    <tr class="text-center">
                                        <td scope="row">{{ $user->firstname }}</td>
                                        <td scope="row">{{ $user->lastname }}</td>
                                        <td scope="row">{{ $user->email }}</td>
                                        <td scope="row">{{ $user->email_verified_at ? "Yes" : "-" }}</td>
                                        <td scope="row">{{ $user->phone }}</td>
                                        <td scope="row">{{ $user->username }}</td>
                                        <td scope="row">{{ $user->role }}</td>
                                        <td scope="row">{{ $user->gender }}</td>
                                        {{-- <td scope="row"></td> --}}
                                    </tr> 
                                @endforeach
                            @else
                                <tr class="text-center">
                                    <td class="text-muted" colspan="100%">
                                        <h2>No User to show!</h2>
                                    </td>                                    
                                </tr>     
                            @endif

                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $users->onEachSide('1')->links('vendor.pagination.simple-bootstrap-4') }}
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection