<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class orederController extends Controller
{
    //
    public function index(){

        $c = Order::all();
        
        return view('pages.Orders.list')->with('orders',$c);
        
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
}
