@extends('layouts.front')

@section('title')
    My Appointments
@endsection

@section('content')
    <div class="container py-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>My Appointments</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Appointment Start</th>
                                    <th>Appointment End</th>
                                    <th>Dog name</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->start }}</td>
                                        <td>{{ $appointment->finish }}</td>
                                        <td>{{ $appointment->dog->name }}</td>
                                        <td>{{ $appointment->type == '1' ? 'Half treatment' : 'Complete Treatment' }}</td>
                                        <td><a href="{{ url('cancle-appointment/'.$appointment->id) }}" class="btn btn-danger float-end">Cancel Appointment</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection