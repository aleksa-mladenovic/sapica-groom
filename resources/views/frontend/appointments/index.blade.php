@extends('layouts.front')

@section('title')
    Appointments
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if($appointemnts->count() > 0)
                        <h2>Appointemnts in next 7 days</h2>
                        <table class="table table-striped">
                            <tr>
                                <th>Dog name</th>
                                <th>Start</th>
                                <th>Finish</th>
                                <th>Type</th>
                            </tr>
                            @foreach ($appointemnts as $item)
                                <tr>
                                    <th>{{ $item->dog->name }} {{ $item->dog->breed }}</th>
                                    <th>{{ $item->start}}</th>
                                    <th>{{ $item->finish}}</th>                                
                                    <th>{{ $item->type}}</th>               
                                </tr>
                            @endforeach
                        </table>
                    @else
                     <h2>There are no appointments in next 7 days</h2>
                    @endif
                </div>
                <div class="col-md-12">
                    <a href="{{ url('make-appointment') }}">
                        <button class="btn btn-primary">Make an appointment</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection