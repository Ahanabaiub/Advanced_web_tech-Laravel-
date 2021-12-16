<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\Order;
use \stdClass;

class productController extends Controller
{
    //

    public function getAll(){
        $p = Product::all();
        
        return $p;
        
    }

    public function allCount(){
        $p = Product::all()->count();
        
        return $p;
    }

        function cmp($a, $b) {
             return strcmp($a->id, $b->id);
        }

    public function topSold(){

    

        $orders = OrderDetail::all('productId','productQuantity');
         $pid = Product::all('id');
        $count = 0;

        $torders = [];

        foreach($pid as $p){
            $torders[$p->id]=0;
        }

        foreach($orders as $o){
            
                $torders[$o->productId]+=$o->productQuantity;
          
        }

        //usort($torders, function($a,$b){return strcmp($a,$b);});

        //$d2o = array_map('data2Object', $torders);

        $torders_coll = collect($torders);
        $sorted = $torders_coll->sortDesc();

        

         $res = [];

         

         $k =  array_keys($sorted->toArray());

         
        foreach($k as $t){

            if($count>=3)
               {
                 break;
               }

            $p = Product::where('id',$t)->first();

            $obj = new stdClass();

            $obj->product = $p;
            $obj->unitSold = $torders[$t];

            $res[]=$obj;
            $count++;
         }






        return json_encode($res);
    }

    public function create(Request $request){

        return view('pages.Products.create');

    }

    public function save(Request $req){

        $validate = $req->validate([
            'name'=>'required',
            'unitPrice'=>'required',
            'details'=>'required',
            'quantity'=>'required',
            'catagoryid'=>'required'
            
        ],
        [
          
        ]);
        $p = new Product();
        $p->name=$req->name;
        $p->unitPrice=$req->unitPrice;
        $p->details=$req->details;
        $p->quantity=$req->quantity;
        $p->image=$req->image;
        $p->catagoryid=$req->catagoryid;

        $p->save();

      
        return $p;
    }

    public function get(Request $req){
        $product = Product::where('id',$req->id)->first();
        return $product;
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

     public function delete(Request $req){

        $p = Product::where('id',$req->id)->first();
        $p->delete();
        return "deleted";



    }


    public function search(Request $req){

        $p = Product::where('name','like',"%{$req->q}%")->get();
        //echo $req->src;
        return $p;



    }
}
