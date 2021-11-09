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


        return "Saved";  

    }
    public function list(){
        $products = Product::all();

        return $products;
       // return view('pages.Products.list')->with('products',$products);
       
    }

    public function get(Request $r){
        $product = Product::where('id',$r->id)->first();

        return $product;
     
       
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

    public function addToCart(Request $request){
        $id = $request->id;
       
        $var = Product::where('id',$id)->first();

        $val = $request->session()->get('cart');

        //echo $val;
       
        if(isset($val)){
            $json = $val;

            $mycart = json_decode($json);
            $mycart[] = $var;

            $request->session()->put('cart', json_encode($mycart));
            

        }
        else{
            $mycart = array($var);
            $request->session()->put('cart', json_encode($mycart));
           // $_SESSION["cart"] = json_encode($mycart);
           //echo "not set";
        }

       return redirect()->route('product.list');
    }

    public function viewMyCart(Request $request){

        $val = $request->session()->get('cart');

        if(isset($val)){

            $products = json_decode($val);

            return view('pages.Products.cart')->with('products',$products);
        }

        return "<h1>No Iteams In Cart</h1>";
    }

    public function viewSession(Request $request){
         $request->session()->forget('cart');
         return redirect()->route('product.list');
    }

}
