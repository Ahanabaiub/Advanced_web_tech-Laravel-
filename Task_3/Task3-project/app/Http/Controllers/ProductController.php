<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    //
    public function create(){
        return view('pages.Products.create');
    }

    public function createSubmit(Request $request){
        $this->validate(
            $request,
            [
                'name'=>'required|min:4|max:10',
                'price'=>'required',
                'quantity'=>'required',
                'description'=>'required'
            ],
            [
                'name.required'=>'Please give a product name'
                
            ]
        );

        $var = new Product();
        $var->name= $request->name;
        $var->price = $request->price;
        $var->quantity = $request->quantity;
        $var->description=$request->description;
       
        $var->save();


        return redirect()->route('product.list');  

    }
    public function list(){
        $products = Product::all();
        return view('pages.Products.list')->with('products',$products);
       
    }

    public function edit(Request $request){
        //
        $id = $request->id;
       
        $product = Product::where('id',$id)->first();
       
        return view('pages.Products.edit')->with('product',$product);

    }

    public function editSubmit(Request $request){
        $var = Product::where('id',$request->id)->first();
        $var->name= $request->name;
        $var->price = $request->price;
        $var->quantity = $request->quantity;
        $var->description=$request->description;
        $var->save();
        return redirect()->route('product.list');

    }

    public function delete(Request $request){
        //
        $id = $request->id;
       
        $var = Product::where('id',$id)->first();
        $var->delete();
       
        return redirect()->route('product.list');

    }

}
