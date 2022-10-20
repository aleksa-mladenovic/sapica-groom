@extends('layouts.front')

@section('title')
    Sapica Groom
@endsection

@section('content')
    @include('layouts.inc.slider')

    {{-- Services --}}
    <div class="container py-4 px-2">
        <div class="row">
            <div class="col-md-5">
                <img src="{{ asset('assets/images/portrait.png') }}" style="width: 100%" alt="Image">
            </div>
            <div class="col-md-7">
                <div class="py-4 px-2">
                    <h4>Our Groomers</h4>
                    <p class="fs-5">
                        &emsp; &emsp;Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                        Nulla ipsum veritatis, labore quae sunt explicabo accusantium officiis accusamus, 
                        amet maiores, dicta ut ea. Fugit quis, obcaecati aut commodi nesciunt earum!
                    </p>
                    <h4>Our Services</h4>
                    <p class="fs-5">
                        &emsp; &emsp;Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                        Nulla ipsum veritatis, labore quae sunt explicabo accusantium officiis accusamus, 
                        amet maiores, dicta ut ea. Fugit quis, obcaecati aut commodi nesciunt earum!
                        Labore quae sunt explicabo accusantium officiis accusamus, 
                        amet maiores, dicta ut ea. Fugit quis, obcaecati aut commodi nesciunt earum!
                    </p>
                    <hr>
                    <h5>Half treatment Contains</h5>
                    <p class="fs-5">
                        &emsp; &emsp;Dog bathing using anti allergic, fur colour specific shampoos. 
                        Blow drying and complete detangling your best friends fury coat.
                    </p>
                    <hr>
                    <h5>Complete treatment Contains</h5>
                    <p class="fs-5">
                        &emsp; &emsp;Dog bathing using anti allergic, fur colour specific shampoos. 
                        Blow drying and complete detangling your best friends fury coat. 
                        Grooming dogs haircuts in standard as well as hairstyles of your choice.
                        Claw clipping, Ear cleaning and sanitary trim.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Pricing tabel --}}
    <div class="container py-4">
        <h2>Treatment Prices</h2>
        <hr>
        <table class="table table-striped">
            <tr>
                <th>Dog size</th>
                <th>Complete Treatment</th>
                <th>Complete Treatment Duration</th>
                <th>Half treatment</th>
                <th>Half treatment Duration</th>
            </tr>
            <tr>
                <th>Small Dogs</th>
                <th>20€</th>
                <th>90 mins</th>
                <th>10€</th>
                <th>45 mins</th>
            </tr>
            <tr>
                <th>Rarely Brushed Small Dogs</th>
                <th>25€</th>
                <th>90 mins</th>
                <th>/</th>
                <th>/</th>
            </tr>
            <tr>
                <th>Medium Dogs</th>
                <th>25€</th>
                <th>90 mins</th>
                <th>15€</th>
                <th>45 mins</th>
            </tr>
            <tr>
                <th>Rarely Brushed Medium Dogs</th>
                <th>30€</th>
                <th>90 mins</th>
                <th>/</th>
                <th>/</th>
            </tr>
            <tr>
                <th>Big Dogs</th>
                <th>35€</th>
                <th>90 mins</th>
                <th>20€</th>
                <th>45 mins</th>
            </tr>
        </table>
    </div>

    {{-- Owl-carousel - Trending products--}}
    <div class="py-4">
        <div class="container">
            <div class="row">
                <h2>Trendig Products</h2>
                <div class="owl-carousel trending-carousel owl-theme">
                     @foreach ($featured_products as $product)
                        <div class="item">
                            <div class="card">
                                <a href="{{ url('view-category/'.$product->category->slug.'/'.$product->slug)  }}">
                                    <img src="{{ asset('assets/uploads/products/'. $product->image) }}" alt="Product image">
                                    <div class="card-body">
                                        <h5>{{ $product->name }}</h5>
                                        <span class="float-start">{{ $product->selling_price }}</span>
                                        <span class="float-end"> <s> {{ $product->original_price }} </s></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @if ($role == '1' || $role == '2')
            <h2>Programers Area: <a href="{{ url('dashboard') }}">Dashboard</a></h2>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        $('.trending-carousel').owlCarousel({
            loop:true,
            margin:10,
            dots:false,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    </script>
@endsection