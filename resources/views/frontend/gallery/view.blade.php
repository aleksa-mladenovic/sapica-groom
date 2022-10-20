@extends('layouts.front')

@section('title')
    {{ $work->title }}
@endsection

@section('content')
    <div class="py-2">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="{{ asset('assets/uploads/works/'. $work->image1) }}" class="d-block w-100" alt="Category image">
                          </div>
                          @if ($work->image2)
                            <div class="carousel-item active">
                                <img src="{{ asset('assets/uploads/works/'. $work->image2) }}" class="d-block w-100" alt="Category image">
                            </div>
                          @endif
                          @if ($work->image3)
                            <div class="carousel-item active">
                                <img src="{{ asset('assets/uploads/works/'. $work->image3) }}" class="d-block w-100" alt="Category image">
                            </div>
                          @endif
                          @if ($work->image4)
                            <div class="carousel-item active">
                                <img src="{{ asset('assets/uploads/works/'. $work->image4) }}" class="d-block w-100" alt="Category image">
                            </div>
                          @endif
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <h2 class="px-2">{{ $work->title }}</h2>
                    <div class="px-2">
                            {{ $work->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection