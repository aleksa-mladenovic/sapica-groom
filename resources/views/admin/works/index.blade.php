@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Works Page</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($works as $work)
                        <tr>
                            <td>{{$work->id}}</td>
                            <td>{{$work->title}}</td>
                            <td>{{$work->status}}</td>
                            <td>
                                <img src="{{asset('assets/uploads/works/'.$work->image1)}}" class="category-image" alt="Image not found">
                            </td>
                            <td>
                                <a href="{{ url('edit-work/'.$work->id) }}"><button class="btn btn-primary">Edit</button></a>
                                <a href="{{ url('delete-work/'.$work->id) }}"><button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection