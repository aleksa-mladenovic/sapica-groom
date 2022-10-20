@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')

    <div class="container my-5">
        <div class="card shadow cartitems">
            @if($items->count() > 0)
                <div class="card-body">
                    @php $total = 0; @endphp
                    @foreach ($items as $item)
                        <div class="row product-data">
                            <div class="col-md-2 my-2">
                                <img src="{{ asset('assets/uploads/products/'.$item->product->image) }}" height="70px" width="70px" alt="Product image">
                            </div>
                            <div class="col-md-3 mt-4">
                                <h6>{{ $item->product->name }}</h6>
                            </div>
                            <div class="col-md-2 mt-4">
                                <h6>{{ $item->product->selling_price }}€</h6>
                            </div>
                            <div class="col-md-3">
                                <input type="hidden" value="{{ $item->product->id }}" class="prod_id">
                                @if ($item->product->quantity >= $item->prod_qty)
                                    <label for="Quantity">Quantity</label>
                                    <div class="input-group text-center mb-3" style="width: 130px">
                                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                                        <input type="text" name="quantity" value="{{ $item->prod_qty }}" class="form-control qty-input">
                                        <button class="input-group-text changeQuantity increment-btn">+</button>
                                    </div>
                                @else
                                <div class="input-group text-center mt-4" style="width: 130px">
                                    <h6> Not enought items in stock </h6>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-2 mt-4">
                                <button class="btn btn-danger delete-card-item">Remove</button>
                            </div>
                        </div>
                        @php
                            $total += $item->product->selling_price * $item->prod_qty;
                        @endphp
                    @endforeach
                </div>
                <div class="card-footer">
                    <h6>
                        Total price : {{ $total }}€
                        <a href="{{url('checkout') }}"><button class="btn btn-outline-success float-end">Procede to Checkout</button></a>
                    </h6>
                </div>
            @else
                <div class="card-body text-center">
                    <h2>Your cart is empty</h2>
                    <a href="{{ url('category') }}">
                        <button class="btn btn-outline-primary float-end">Continue Shopping</button>
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection