@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update Appointment</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-appointment/'.$appointment->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 my-1">
                        <label for="">Start</label>
                        <input type="datetime-local" class="form-control border" name="start">
                    </div>              
                    <div class="col-md-6 my-1">
                        <label for="">Select type of treatment</label>
                        <select class="form-select boreder" name="type" aria-label="Select a category">
                            <option value="1">Half treatment</option>
                            <option value="2">Complete Treatment</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection