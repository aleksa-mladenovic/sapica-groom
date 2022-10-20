@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Products Page</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Selling Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td >{{$product->id}}</td>
                            <td >{{$product->category->name}}</td>
                            <td >{{$product->name}}</td>
                            <td >{{$product->selling_price}}</td>
                            <td>
                                <img src="{{asset('assets/uploads/products/'.$product->image)}}" class="category-image" alt="Image not found">
                            </td>
                            <td>
                                <a href="{{ url('edit-product/'.$product->id) }}"><button class="btn btn-primary btn-sm">Edit</button></a>
                                <a href="{{ url('delete-product/'.$product->id) }}"><button class="btn btn-danger btn-sm">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection