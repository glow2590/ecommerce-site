@extends('layouts.front')

@section('content')
<div class="container-fluid">
    <div class="row bg-border-color medium-padding120">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">

                    <div class="cart">

                        <h1 class="cart-title">In Your Shopping Cart: <span class="c-primary"> {{Cart::content()->count()}} items</span></h1>

                    </div>

                    <form action="#" method="post" class="cart-main">

                        <table class="shop_table cart">
                            <thead class="cart-product-wrap-title-main">
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach(Cart::content() as $pdt)
                                
                            <tr class="cart_item">

                                    <td class="product-remove">
                                        <a href="#" class="product-del remove" title="Remove this item">
                                            <i class="seoicon-delete-bold"></i>
                                        </a>
                                    </td>

                                    <td class="product-thumbnail">

                                        <div class="cart-product__item">
                                            <a href="#">
                                                <img src="{{asset($pdt->model->image)}}" alt="product" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                            </a>
                                            <div class="cart-product-content">
                                                
                                            <h5 class="cart-product-title">{{$pdt->name}}</h5>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="product-price">
                                    <h5 class="price amount">${{$pdt->price}}</h5>
                                    
                                    </td>

                                    <td class="product-quantity">

                                        <div class="quantity">
                                            
                                            <input title="Qty" class="email input-text qty text" value="{{$pdt->qty}}" type="text" placeholder="1" readonly>
                                          
                                        </div>

                                    </td>

                                    <td class="product-subtotal">
                                    <h5 class="total amount">{{$pdt->total()}}</h5>
                                    <h6 class="badge badge-warning">Tax:{{$pdt->tax()}}</h3>
                                    </td>

                                </tr>
                                    @endforeach
                                

                                <tr>
                                    <td colspan="5" class="actions">

                                        <div class="coupon">
                                            <input name="coupon_code" class="email input-standard-grey form-control" value="" placeholder="Coupon code" type="text">
                                            <div class="btn btn-medium btn-primary btn-hover-shadow">
                                                <span class="text">Apply Coupon</span>
                                                <span class="semicircle--right"></span>
                                            </div>
                                        </div>

                                        <div class="btn btn-medium btn-dark btn-hover-shadow">
                                            <span class="text">Apply Coupon</span>
                                            <span class="semicircle"></span>
                                        </div>

                                    </td>
                            </tr>

                            </tbody>
                        </table>


                    </form>

                    <div class="cart-total">
                        <h3 class="cart-total-title text-success ">Cart Totals</h3>
                        <h5 class="cart-total-total">Total: <span class="price">{{Cart::total()}}</span><span class="badge badge-warning">Tax:{{Cart::tax()}}</span></h5>   
                    
                        <a href="{{route('cart.checkout')}}" class="btn btn-medium btn-success btn-hover-shadow">
                            Checkout 
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
    
@endsection