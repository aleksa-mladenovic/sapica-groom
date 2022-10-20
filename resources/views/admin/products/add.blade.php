@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{url('insert-product')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 m3-3">
                        <select class="form-select boreder" name="category_id" aria-label="Select a category">
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-1">
                        <label for="">Name</label>
                        <input type="text" class="form-control border" name="name">
                    </div>              
                    <div class="col-md-6 mb-1">
                        <label for="">Slug</label>
                        <input type="text" class="form-control border" name="slug">
                    </div>       
                    <div class="col-md-12 mb-2">
                        <label for="">Small Description</label>
                        <textarea name="small_description" cols="30" rows="5" class="form-control border"></textarea>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="">Description</label>
                        <textarea name="description" cols="30" rows="5" class="form-control border"></textarea>
                    </div>
                    <div class="col-md-6 mb-1">
                        <label for="">Original Price</label>
                        <input type="number" step="0.01" class="form-control border" name="original_price">
                    </div>  
                    <div class="col-md-6 mb-1">
                        <label for="">Selling Price</label>
                        <input type="number" step="0.01" class="form-control border" name="selling_price">
                    </div>  
                    <div class="col-md-12 mb-1">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control border" name="quantity">
                    </div>  
                    <div class="col-md-6 mb-1">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div>        
                    <div class="col-md-6 mb-1">
                        <label for="">Treding</label>
                        <input type="checkbox" name="treding">
                    </div>                
                    <div class="col-md-12 mb-1">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control border" name="meta_title">
                    </div>                     
                    <div class="col-md-12 mb-1">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control border"></textarea>
                    </div>          
                    <div class="col-md-12 mb-2">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control border"></textarea>
                    </div>
                    <div class="col-md-12 mb-2">
                        <input type="file" name="image" id="form-control mb-3">
                    </div>          
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection