@extends('layouts.front')

@section('title')
    Add Dogo
@endsection

@section('content')

    <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6>Dogs details</h6>
                            <hr>
                            <form action="{{ url('insert-dog') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Dog Name</label>
                                    <input type="text" class="form-control fname" placeholder="Insert Dog Name" name="name">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Dog Breed</label>
                                    <input type="text" class="form-control fname" placeholder="Insert Dog Breed" name="breed">
                                </div>
                                <div class="col-md-6 my-2">
                                    <button type="submit" class="btn btn-primary w-100">Add Dogo</button>
                                </div>
                                <div class="col-md-6 my-2">
                                    <h6>Note: You can have up to 5 dogs registerd per account.</h6>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
@endsection