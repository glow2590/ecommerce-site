@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new product
                </div >
                <div class="card-body">

                <form method="POST" action="{{route('products.update',['id'=>$product->id])}}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      {{method_field('PUT')}}
                        <div class="form-group">
                          <label for="name">product name</label>
                        <input type="text" class="form-control" name="name" value="{{$product->name}}" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="image">product image</label>
                          <input type="file" class="form-control" name="image"  placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="price">Price</label>
                          <input type="text" class="form-control" name="price" value="{{$product->price}}" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="description">description</label>
                          <input type="text" class="form-control" name="description" value="{{$product->description}}" placeholder="">
                        </div>
                        <button type="submit" class="btn btn-success btn-lg btn-block">Save Product</button>
                      </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
