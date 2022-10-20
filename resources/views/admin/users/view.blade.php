@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            User Details
                            <a href="{{ url('admin-users') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mt-1">
                                <label for="">Role</label>
                                <div class="p-2 border">{{ $user->role_as == '1' ? 'Admin' : 'User' }}</div>
                            </div>
                            <div class="col-md-4 mt-1">
                                <label for="">First Name</label>
                                <div class="p-2 border">{{ $user->name }}</div>
                            </div>
                            <div class="col-md-4 mt-1">
                                <label for="">Last Name</label>
                                <div class="p-2 border">{{ $user->lname }}</div>
                            </div>
                            <div class="col-md-4 mt-1">
                                <label for="">Email</label>
                                <div class="p-2 border">{{ $user->email }}</div>
                            </div>
                            <div class="col-md-4 mt-1">
                                <label for="">Phone</label>
                                <div class="p-2 border">{{ $user->phone }}</div>
                            </div>
                            <div class="col-md-4 mt-1">
                                <label for="">Address 1</label>
                                <div class="p-2 border">{{ $user->address1 }}</div>
                            </div>
                            <div class="col-md-4 mt-1">
                                <label for="">Address 2</label>
                                <div class="p-2 border">{{ $user->address2 }}</div>
                            </div>
                            <div class="col-md-4 mt-1">
                                <label for="">City</label>
                                <div class="p-2 border">{{ $user->city }}</div>
                            </div>
                            <div class="col-md-4 mt-1">
                                <label for="">State</label>
                                <div class="p-2 border">{{ $user->state }}</div>
                            </div>
                            <div class="col-md-4 mt-1">
                                <label for="">Country</label>
                                <div class="p-2 border">{{ $user->country }}</div>
                            </div>
                            <div class="col-md-4 mt-1">
                                <label for="">Pin Code</label>
                                <div class="p-2 border">{{ $user->pincode }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection