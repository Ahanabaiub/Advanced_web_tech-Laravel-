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
}
