@extends('layouts.front')

@section('content')




<div class="content-wrapper">

    <div class="container">
        <div class="row pt120">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="heading align-center mb60">
                    <h4 class="h1 heading-title">Udemy E-commerce tutorial</h4>
                    <p class="heading-text">Buy books, and we ship to you.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- End Books products grid -->

    <div class="container">
        <div class="row pt120">
            <div class="books-grid">

            <div class="row mb30">
              
              @foreach ($products as $product)     
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="books-item">
                            <div class="books-item-thumb">
                                <img src="{{asset($product->image)}}" alt="book">
                                <div class="new">New</div>
                                <div class="sale">Sale</div>
                                <div class="overlay overlay-books"></div>
                            </div>

                            <div class="books-item-info">
                            <a href="{{route('product.single',['id'=>$product->id])}}"> <h6 class="books-title">{{$product->name}}</h5>
                            </a>
                                <div class="books-price">${{$product->price}}</div>
                            </div>

                       <form action="{{route('cart.add')}}" method="post">
                        {{ csrf_field() }}
                    <input title="Qty" class="email input-text qty text" name="qty" type="hidden" value="1">
                     
                <input type="hidden" name="pdt_id" value="{{$product->id}}">
                  <button class="btn btn-primary">
                      add to cart
                    <i class="seoicon-commerce"></i>
                  </button>
                    </form>

                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row pb120">

                <div class="col-lg-12">

                    <nav class="navigation align-center">

                        {{$products->links()}}
                        
                    </nav>

                </div>

            </div>
        </div>
        </div>
    </div>
</div>
@endsection