<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\Order;

class productController extends Controller
{
    //

    public function index(){
        $p = Product::all();
        
        return view('pages.Products.list')->with('products',$p);
        
    }

    public function create(Request $request){

        return view('pages.Products.create');

    }

    public function save(Request $req){

        $validate = $req->validate([
            'name'=>'required|min:4|max:100',
            'unitPrice'=>'required',
            'details'=>'required|min:5|max:15',
            'quantity'=>'required',
            'categoryId'=>'required'
            
        ],
        [
          
        ]);
        $p = new Product();
        $p->name=$req->name;
        $p->unitPrice=$req->unitPrice;
        $p->details=$req->details;
        $p->quantity=$req->quantity;
        $p->image=$req->image;
        $p->catagoryId=$req->catagoryId;

        $p->save();

      
        return redirect()->route('product.index');
    }

    public function details(Request $req){

        $totalOrdered = OrderDetail::where('productId',$req->id)->get();

        $orders = array();

        foreach($totalOrdered as $o)
        {
            $orders[]=$o->orderId;
        }

        $ordersU = array_unique($orders);
        $AllOrders = Order::all();

        $sold = 0;
        $totalPrice = 0;

        foreach($totalOrdered as $o)
        {
            $sold+=$o->productQuantity;
            $totalPrice += $o->product->unitPrice * $o->productQuantity;
        }

        // echo $sold." ".$totalPrice;

        // echo $AllOrders;
        //echo json_encode($orders);

         //echo json_encode($ordersU);


        return view('pages.Products.details')->with("orders",$orders)
        ->with("AllOrders",$AllOrders)->with("sold",$sold)
        ->with("total",$totalPrice);
    }


    public function search(Request $req){

        $p = Product::where('name','like',"%{$req->src}%")->get();
        //echo $req->src;
        return view('pages.Products.list')->with('products',$p);

    }
}
