@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h4>
                                Orders History
                                <a href="{{ 'admin-orders' }}" class="btn btn-warning float-end mx-1">New Orders</a>
                                <a href="{{ 'admin-orders/pdf' }}" class="btn btn-success float-end mx-1">Tabel to PDF</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order Date</th>
                                        <th>Tracking Number</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                            <td>{{ $order->tracking_number }}</td>
                                            <td>{{ $order->total_price }}</td>
                                            <td>{{ $order->status == '0' ? 'Pending' : 'Completed' }}</td>
                                            <td><a href="{{ url('admin/view-order/'.$order->id) }}" class="btn btn-primary">View</a></td>
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