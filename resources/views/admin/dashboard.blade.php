@extends('partials.template')

@push('title')
Admin Dashboard | Book Store 
@endpush

@section('main')

<div class="row">
    <div class="col-sm-4 p-3">
        <div class="border d-flex justify-content-center align-items-center rounded-circle overflow-hidden" style="width: 200px; height: 200px;">
            <a href="{{ route('upload.avatar', ['role' => auth()->user()->role]) }}">
                <img src="{{ asset(auth()->user()->avatar) }}" alt="User" class="w-100">
            </a>
        </div>
        <br>
        <div>
            <h3>{{ auth()->user()->firstname." ".auth()->user()->lastname }} <small class="text-muted">({{ '@'.auth()->user()->username }})</small></h3>
        </div>
    </div>
    <div class="col-sm-8 p-3">
        <div class="card">
            <div class="card-body">
                <h3 class="text-uppercase border-start border-5 border-warning ps-3">overview</h3>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td colspan="1">Total No. of Users:</td>
                                <td colspan="3">{{ $total_user }}</td>
                            </tr>
                            <tr>
                                <td colspan="1">Total No. of Verified Users:</td>
                                <td colspan="3">{{ $verified_user }}</td>
                            </tr>
                            <tr>
                                <td colspan="1">Total No. of Books:</td>
                                <td colspan="3">{{ $total_book }}</td>
                            </tr>
                            <tr>
                                <td colspan="1">Total No. of Categories:</td>
                                <td colspan="3">{{ $total_category }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection