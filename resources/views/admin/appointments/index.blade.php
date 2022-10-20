@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Appointments Page</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Id</th>
                    <th>Dog Name</th>
                    <th>User</th>
                    <th>Start</th>
                    <th>Finish</th>
                    <th>Type</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($appointemnts as $appointment)
                        <tr>
                            <td>{{$appointment->id}}</td>
                            <td>{{$appointment->dog->name}}</td>
                            <td>{{$appointment->user->name}} {{$appointment->user->lname}}</td>
                            <td>{{$appointment->start}}</td>
                            <td>{{$appointment->finish}}</td>
                            <td>{{ $appointment->type == '1' ? 'Half treatment' : 'Complete Treatment' }}</td>
                            <td>
                                <a href="{{ url('edit-appointment/'.$appointment->id) }}"><button class="btn btn-primary">Edit</button></a>
                                <a href="{{ url('delete-appointment/'.$appointment->id) }}"><button class="btn btn-danger">Cancel</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection