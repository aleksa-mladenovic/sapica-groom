@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update work</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-work/'.$work->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4 mb-1">
                        <label for="">Title*</label>
                        <input type="text" class="form-control border" value="{{ $work->title }}" name="name">
                    </div>                     
                    <div class="col-md-4 mb-1">
                        <label for="">Slug*</label>
                        <input type="text" class="form-control border" value="{{ $work->slug }}" name="slug">
                    </div>
                    <div class="col-md-4 mb-1">
                        <label for="">Dog id*</label>
                        <input type="text" class="form-control border" value="{{ $work->dog_id }}" name="dog_id">
                    </div>                     
                    <div class="col-md-12 mb-2">
                        <label for="">Description*</label>
                        <textarea name="description" cols="30" rows="5" class="form-control border">{{ $work->description }}</textarea>
                    </div>
                    <div class="col-md-12 ">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $work->status ? 'checked' : ''}} name="status">
                    </div>                     
                    <div class="col-md-3 ">
                        @if($work->image1)
                            <img src="{{ asset('assets/uploads/works/'.$work->image1) }}" style="width: 100px" alt="work Image">
                        @endif
                        <label for="">Image 1*</label>
                        <input type="file" name="image1" id="form-control mb-3">
                    </div>         
                    <div class="col-md-3 ">
                        @if($work->image2)
                            <img src="{{ asset('assets/uploads/works/'.$work->image2) }}" style="width: 100px" alt="work Image">
                        @endif
                        <label for="">Image 2</label>
                        <input type="file" name="image2" id="form-control mb-3">
                    </div>     
                    <div class="col-md-3 ">
                        @if($work->image3)
                            <img src="{{ asset('assets/uploads/works/'.$work->image3) }}" style="width: 100px" alt="work Image">
                        @endif
                        <label for="">Image 3</label>
                        <input type="file" name="image3" id="form-control mb-3">
                    </div>     
                    <div class="col-md-3 ">
                        @if($work->image4)
                            <img src="{{ asset('assets/uploads/works/'.$work->image4) }}" style="width: 100px" alt="work Image">
                        @endif
                        <label for="">Image 4</label>
                        <input type="file" name="image4" id="form-control mb-3">
                    </div>      
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection