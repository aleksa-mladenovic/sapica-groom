@extends('layouts.front')

@section('title')
    {{ $product->name }}
@endsection

@section('content')

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/add-rating') }}" method="POST">
                @csrf
                <input type="hidden" name="prod_id" value="{{ $product->id }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rate {{ $product->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rating-css">
                        <div class="star-icon">
                            @if ($user_rating)
                                @for ($i = 1; $i <= $user_rating->stars_rated; $i++)
                                    <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                    <label for="rating{{$i}}" class="fa fa-star"></label>
                                @endfor
                                @for ($j = $user_rating->stars_rated+1; $j <= 5; $j++)
                                    <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                                    <label for="rating{{$j}}" class="fa fa-star"></label>
                                @endfor
                            @else
                            <input type="radio" value="1" name="product_rating" checked id="rating1">
                            <label for="rating1" class="fa fa-star"></label>
                            <input type="radio" value="2" name="product_rating" id="rating2">
                            <label for="rating2" class="fa fa-star"></label>
                            <input type="radio" value="3" name="product_rating" id="rating3">
                            <label for="rating3" class="fa fa-star"></label>
                            <input type="radio" value="4" name="product_rating" id="rating4">
                            <label for="rating4" class="fa fa-star"></label>
                            <input type="radio" value="5" name="product_rating" id="rating5">
                            <label for="rating5" class="fa fa-star"></label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    <div class="container py-2">
        <div class="card shadow product-data">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ asset('assets/uploads/products/'. $product->image) }}" class="w-100" alt="Product image">
                </div>
                <div class="col-md-8">
                    <h2 class="mt-2 mb-0">
                        {{ $product->name }}
                        @if ($product->trending == '1')
                            <label style="font-size: 16px" class="float-end badge bg-danger trending_tag mx-1">
                                Trending
                            </label>
                        @endif
                    </h2>
                    <hr>
                    <label class="me-3">Original Price : <s> {{ $product->original_price }}€</s></label>
                    <label class="fw-bold">Selling Price : {{ $product->selling_price }}€</label>
                    <div class="rating">
                        @for ($i = 0; $i < number_format($rating_val); $i++)
                            <i class="fa fa-star" style="color: gold"></i>
                        @endfor
                        @for ($i = number_format($rating_val); $i < 5; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                        <span>
                            @if ($ratings->count()>0)
                                {{ $ratings->count() }} Ratings
                            @else
                                No ratings
                            @endif
                        </span>
                    </div>
                    <p class="mt-3">
                        {!! $product->small_description !!}
                    </p>
                    <hr>
                    @if($product->quantity > 0)
                        <label class="badge bg-success">In stock</label>
                    @else
                        <label class="badge bg-danger">Out of stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input type="hidden" value="{{ $product->id }}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" value="1" class="form-control qty-input">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br/>
                            @if($product->quantity > 0)
                                <button class="btn btn-primary me-3 float-start addToCartBtn">Add to Cart <i class="fa fa-cart-shopping"></i></button>
                            @endif
                            <button class="btn btn-success me-3 float-start addToWhishlistBtn">Add to Wishlist <i class="fa fa-list"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 mx-4">
                    <h2>Description</h2>
                    <p>{!! $product->description !!}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary mb-2 mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Rate this product
                    </button>
                    <a href="{{ url('add-review/'.$product->slug.'/userreview') }}" class="btn btn-primary mb-2">Write a review</a>
                </div>
                <div class="col-md-8">
                    @foreach ($reviews as $item)
                        <div class="user-review">
                            <label for="">{{ $item->user->name.' '.$item->user->lname }}</label>
                            @if($item->user_id == Auth::id())
                                <a href="{{ url('edit-review/'.$product->slug) }}">edit</a>
                            @endif
                            <br/>
                            @if ($item->rating)
                                @php $user_rated = $item->rating->stars_rated @endphp
                                @for ($i = 0; $i < $user_rated; $i++)
                                    <i class="fa fa-star" style="color: gold"></i>
                                @endfor
                                @for ($i = $user_rated; $i < 5; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            @endif
                            <small>Reviewed on {{ $item->created_at->format('d M Y') }}</small>
                            <p>
                                {{ $item->user_review }}
                            </p>       
                        </div>            
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection