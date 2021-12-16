<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Category;
use App\Models\Order_category_dto;


class orederController extends Controller
{
    //
    public function index(){

        $c = Order::all();
        
        return $c;
        
    }

    public function count(){

        $c = Order::all()->count();
        
        return $c;
        
    }

    public function orderChat(){
        

        $categorys = Category::all('name');


        $orders = OrderDetail::all('productId','productQuantity');

        $order = [];

         foreach($categorys as $c){
            $order[$c->name] = 0;
        }

        foreach($orders as $o){        
      
            $order[$o->product->category->name]+=$o->productQuantity;
            
            
        }

        return $order;
        
    }

    public function details(Request $req){

        $c = OrderDetail::where("orderId",$req->id)->get();
        
        return view('pages.Orders.details')->with('ods',$c);
        
    }

    public function cancell(Request $req){

        $c = Order::where("id",$req->id)->first();

        $c->status = "Cancelled";

        $c->save();
        
        return redirect()->route('order.index');
        
    }

    
    public function search(Request $req){

        $c = Order::where('created_at','like',"%{$req->src}%")->
        orWhere('status','like',"%{$req->src}%")
        ->get();
        //echo $req->src;
        return view('pages.Orders.list')->with('orders',$c);

    }

    public function getMonthlyData(Request $req){
        $currentYear = date('Y');

        $orders = [];

        for($i=0; $i<12; $i++){

            $mn = ($i<9)?'0'.($i+1) : ($i+1);

            $c = Order::where('created_at','like',$currentYear."-".$mn."%")
                ->get()->count();
            $orders[] = $c;    
        }

        return $orders;
    }


     public function getMonthlySellData(Request $req){
        $currentYear = date('Y');

        $selles = [];

        for($i=0; $i<12; $i++){

            $mn = ($i<9)?'0'.($i+1) : ($i+1);

            $orders = Order::where('created_at','like',$currentYear."-".$mn."%")->get();
           
            $ammount =0;
            
            foreach($orders as $o){

                $order_details =OrderDetail::where('orderId',$o->id)->get();
               

                foreach($order_details as $od){

                    $ammount+= $od->product->unitPrice * $od->productQuantity;

                }

               
                

             }  

            $selles[] = $ammount; 


           
        }

        return $selles;
    }


      public function getYearlySellData(Request $req){
        $currentYear = date('Y');

        $selles = [];

        for($i=$currentYear-5; $i<=$currentYear; $i++){

           

            $orders = Order::where('created_at','like',$i."%")->get();
           
            $ammount =0;
            
            foreach($orders as $o){

                $order_details =OrderDetail::where('orderId',$o->id)->get();
               

                foreach($order_details as $od){

                    $ammount+= $od->product->unitPrice * $od->productQuantity;

                }

               
                

             }  

            $selles[$i] = $ammount; 


           
        }
        $selles[$currentYear+1]=0;

        return $selles;
    }
}
