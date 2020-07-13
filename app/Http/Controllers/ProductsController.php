<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
         $this->middleware('auth');
     }
    public function index()
    {
        return view('products.index',['products'=>Product::paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create',['products'=>Product::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    $this->validate($request,[
        
        'name' => 'string|required|unique:products|max:255',
        'image' => 'required|image',
        'price'=>'integer|required',
        'description'=>'required'
    ]);
    $image = $request->file('image');
    $image_new_name = time().$image->getClientOriginalName();
    $image->move('uploads/products',$image_new_name);
    $product = Product::create([
            'name'=>$request->name,
            'image'=>$image_new_name,
            'price'=>$request->price,
            'description'=>$request->description

    ]);
        Session::flash('success',$product->name.' '.'added successfully');
        return redirect()->route('products.index');
       }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.edit',['product'=>Product::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required|string|max:255|unique:products,name,'.$id,
            'image'=>'nullable|image|unique:products,image,'.$id,
            'price'=>'integer|required',
            'description'=>'required'
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        if ($request->image) {
            if (file_exists($product->image)) {
                unlink($product->image);
            }
        $image = $request->file('image');
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/products',$image_new_name);
         $product->image = 'uploads/products'.$image_new_name;

        }
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        Session::flash('success',$product->name.' '.'is saved!');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (file_exists($product->image))
            unlink($product->image);
        $product->delete();
        Session::flash('success',$product->name.' '.' deleted successfully!');
        return redirect()->back();
    }
}
