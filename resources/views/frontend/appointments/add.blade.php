@extends('layouts.front')

@section('title')
    Make an Appointment
@endsection

@section('content')
<div class="container my-4">
    <div class="card">
        <div class="card-header">
            <h4>Make an Appointment</h4>
        </div>
        <div class="card-body">
            <form action="{{url('insert-appointment')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12 my-1">
                        <label for="">Select one of your dogs</label>
                        <select class="form-select boreder" name="dog_id" aria-label="Select a category">
                            @foreach ($dogs as $dog)
                                <option value="{{ $dog->id }}">{{ $dog->name }}</option>
                            @endforeach
                        </select>
                    </div>
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
                    <div class="col-md-12 my-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection