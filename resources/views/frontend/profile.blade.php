@extends('layouts.front')

@section('title')
    My Profile
@endsection

@section('content')

    <div class="container mt-3">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <form action="{{ url('edit-profile') }}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="card-body">
                                <h6>Basic details</h6>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">First Name</label>
                                        <input type="text" class="form-control fname" value="{{ Auth::user()->name }}" name="fname" placeholder="Enter First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Last Name</label>
                                        <input type="text" class="form-control lname" value="{{ Auth::user()->lname }}" name="lname" placeholder="Enter Last Name">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control email" value="{{ Auth::user()->email }}" name="email" placeholder="Enter Email">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Phone Number</label>
                                        <input type="text" class="form-control phone" value="{{ Auth::user()->phone }}" name="phone" placeholder="Enter Phone number">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Address 1</label>
                                        <input type="text" class="form-control address1" value="{{ Auth::user()->address1 }}" name="address1" placeholder="Enter Address 1">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Address 2</label>
                                        <input type="text" class="form-control address2" value="{{ Auth::user()->address2 }}" name="address2" placeholder="Enter Address 2">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">City</label>
                                        <input type="text" class="form-control city" value="{{ Auth::user()->city }}" name="city" placeholder="Enter City">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">State</label>
                                        <input type="text" class="form-control state" value="{{ Auth::user()->state }}" name="state" placeholder="Enter State">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Country</label>
                                        <input type="text" class="form-control country" value="{{ Auth::user()->country }}" name="country" placeholder="Enter Country">
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <label for="">Pin Code</label>
                                        <input type="text" class="form-control pincode" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Enter Pin Code">
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <button type="submit" class="btn btn-success w-100">Edit Basic Details</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Dogs details</h6>
                            <hr>
                            <div class="row"></div>
                                @foreach ($dogs as $dog)
                                    <form action="{{ url('edit-dog/'.$dog->name) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Dog Name</label>
                                            <input type="text" class="form-control fname" value="{{ $dog->name }}" name="name">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Dog Breed</label>
                                            <input type="text" class="form-control fname" value="{{ $dog->breed }}" name="breed">
                                        </div>
                                        <div class="col-md-12 my-2">
                                            <button type="submit" class="btn btn-success w-100">Edit Details About {{ $dog->name }}</button>
                                        </div>
                                    </div>
                                    </form>
                                @endforeach
                                <div class="col-md-12 mt-2 mr-2">
                                    <a href="{{ url('add-dog') }}"><button class="btn btn-primary w-100">Add Dog</button></a><
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
@endsection