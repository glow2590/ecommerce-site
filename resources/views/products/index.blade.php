@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products
                </div>
                <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Price</th>
                        <th class="text-center">Edit</th>
                        <th class="text-center">Delete</th>
                
                
                    </thead>
                
                    <tbody>
                        @if ($products->count())
                        {{$products->count()}}
                        @foreach ($products as $product)
                        
                     
                   
                    <tr>
                        <td>
                          {{$product->id}} :{{$product->name}}
                        </td>
                        <td>
                            {{$product->price}}
                        </td>
                        <td class="text-center">
                        <a href="{{route('products.edit',['id'=> $product->id])}}" class="btn btn-sm btn-info">Edit</a>

                        </td>
                        <td class="text-center">
                        <form action="{{route('products.destroy',['id'=> $product->id])}}" method="POST">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}
                        <button  type="submit"  class="btn btn-sm btn-danger">Delete</button>
                    </form>    
                    </td>
                    </tr>
                   
                    @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">
                                No Products found
                            </th>
                        </tr>
                       
                            
                        @endif
                    </tbody>
                </table>

                
            </div>
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
