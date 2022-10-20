@extends('layouts.front')

@section('title')
    Gallery
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Works</h2>
                    <div class="row">
                        @foreach ($works as $item)
                            <div class="col-md-4 mb-2">
                                <a href="{{ url('view-work/'.$item->slug) }}">
                                    <div class="card">
                                        <img src="{{ asset('assets/uploads/works/'. $item->image1) }}" alt="Category image">
                                        <div class="card-body">
                                            <h5>{{ $item->title }}</h5>
                                            <h6>Dog: {{ $item->dog->name }} {{ $item->dog->breed }}</h6>
                                            <p>
                                                {{ $item->description }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection