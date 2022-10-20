@extends('layouts.front')

@section('title')
    My Whishlist
@endsection

@section('content')

    <div class="container my-5">
        <div class="card shadow wishlistitems">
            <div class="card-body">
                @if($wishlist->count() > 0)
                    @foreach ($wishlist as $item)
                        <div class="row product-data">
                            <div class="col-md-2 my-2">
                                <img src="{{ asset('assets/uploads/products/'.$item->product->image) }}" height="70px" width="70px" alt="Product image">
                            </div>
                            <div class="col-md-2 mt-4">
                                <h6>{{ $item->product->name }}</h6>
                            </div>
                            <div class="col-md-2 mt-4">
                                <h6>{{ $item->product->selling_price }}€</h6>
                            </div>
                            <div class="col-md-2 mt-4">
                                <input type="hidden" value="{{ $item->product->id }}" class="prod_id">
                                <input type="hidden" value="1" class="qty-input">
                                @if ($item->product->quantity > 0)
                                    <h6 style="color: green"> In stock </h6>
                                @else
                                    <h6 style="color: red"> Out of stock </h6>
                                @endif
                            </div>
                            @if ($item->product->quantity > 0)
                                <div class="col-md-2 mt-4">
                                    <button class="btn btn-success addToCartBtn">Add to Cart</button>
                                </div>
                            @endif
                            <div class="col-md-2 mt-4">
                                <button class="btn btn-danger delete-wishlist-item">Remove</button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4>There are no products in your wishlist</h4>
                @endif
            </div>
        </div>
    </div>
@endsection