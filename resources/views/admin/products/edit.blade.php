@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 m3-3">
                        <select class="form-select boreder" name="category_id" aria-label="Select a category">
                            <option value="">{{ $product->category->name}}</option>
                            
                        </select>
                    </div>
                    <div class="col-md-6 mb-1">
                        <label for="">Name</label>
                        <input type="text" value="{{ $product->name }}" class="form-control border" name="name">
                    </div>              
                    <div class="col-md-6 mb-1">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $product->slug }}" class="form-control border" name="slug">
                    </div>       
                    <div class="col-md-12 mb-2">
                        <label for="">Small Description</label>
                        <textarea name="small_description" cols="30" rows="5" class="form-control border">{{ $product->small_description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="">Description</label>
                        <textarea name="description" cols="30" rows="5" class="form-control border">{{ $product->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-1">
                        <label for="">Original Price</label>
                        <input type="number" value="{{ $product->original_price }}" step="0.01" class="form-control border" name="original_price">
                    </div>  
                    <div class="col-md-6 mb-1">
                        <label for="">Selling Price</label>
                        <input type="number" step="0.01" class="form-control border" name="selling_price" value="{{ $product->selling_price }}">
                    </div>  
                    <div class="col-md-6 mb-1">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control border" name="quantity" value="{{ $product->quantity }}">
                    </div>   
                    <div class="col-md-6 mb-1">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $product->status ? 'checked' : ''}} name="status">
                    </div>                     
                    <div class="col-md-6 mb-1">
                        <label for="">Trending</label>
                        <input type="checkbox" {{ $product->trending ? 'checked' : ''}} name="trending">
                    </div>
                    <div class="col-md-12 mb-1">
                        <label for="">Meta Title</label>
                        <input type="text" value="{{ $product->meta_title }}" class="form-control border" name="meta_title">
                    </div>                     
                    <div class="col-md-12 mb-1">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control border"> {{ $product->meta_descrip }} </textarea>
                    </div>          
                    <div class="col-md-12 mb-2">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control border"> {{ $product->meta_keywords }} </textarea>
                    </div>
                    @if($product->image)
                        <img src="{{ asset('assets/uploads/products/'.$product->image) }}" alt="Product Image">
                    @endif
                    <div class="col-md-12 mb-3">
                        <input type="file" name="image" id="form-control mb-3">
                    </div>            
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection