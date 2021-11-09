<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function makeOrder(Request $request){
        $val = $request->session()->get('cart');

        if(isset($val)){

            $products = json_decode($val);

            $customer =  $request->session()->get('customer');

                
            $order = new Order();
            $order->customerId= $customer->id;
         
        
            $order->save();
            
            foreach($products as $p){

                $orderDetails = new OrderDetails();
                $orderDetails->orderId=$order->id;
                $orderDetails->productId=$p->id;

                $orderDetails->save();

            }
           

           // return view('pages.Products.cart')->with('products',$products);
        }

        return redirect()->route('product.list');  
    }

}
