@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new product
                </div >
                <div class="card-body">

                <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                        <div class="form-group">
                          <label for="name">product name</label>
                          <input type="text" class="form-control" name="name" placeholder="Example input">
                        </div>
                        <div class="form-group">
                          <label for="image">product image</label>
                          <input type="file" class="form-control" name="image"  placeholder="Another input">
                        </div>
                        <div class="form-group">
                          <label for="price">Price</label>
                          <input type="text" class="form-control" name="price" placeholder="Example input">
                        </div>
                        <div class="form-group">
                          <label for="description">description</label>
                          <input type="text" class="form-control" name="description" placeholder="Example input">
                        </div>
                        <button type="submit" class="btn btn-success btn-lg btn-block">Add Product</button>
                      </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
