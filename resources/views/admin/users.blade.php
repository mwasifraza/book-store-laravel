@extends('partials.template')

@push('title')
Registered Users | Book Store 
@endpush

@section('main')
<div class="row">
    <div class="col-sm-10 mx-auto">
        <div class="d-flex flex-direction-row">
            <div class="border d-flex justify-content-center align-items-center rounded-circle" style="width: 75px; height: 75px;">
                <img src="{{ asset($user->avatar) }}" alt="User" class="w-100">
            </div>
            <div class="ms-3 d-flex align-items-center">
                <div>
                    <h4 class="m-0">{{ $user->firstname." ".$user->lastname }}</h4>
                    <h6 class="text-muted m-0">{{ '@'.$user->username }}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto col-sm-10 p-3">
        <div class="card">
            <div class="card-body">
                <h4 class="text-uppercase border-start border-5 border-warning ps-3">All Users</h4>
                <hr>
                <div class="d-flex justify-content-end">
                    <a href="#" class="btn btn-warning mb-3 px-5">Add User</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">Column 1</th>
                                <th scope="col">Column 2</th>
                                <th scope="col">Column 3</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td scope="row">R1C1</td>
                                <td>R1C2</td>
                                <td>R1C3</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection