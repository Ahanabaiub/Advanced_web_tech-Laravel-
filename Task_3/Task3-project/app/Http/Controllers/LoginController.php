<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
    public function login(){
        return view('pages.login');
    }

    public function validateLogin(Request $request){

        $this->validate(
            $request,
            [
                'name'=>'required',
                'phone'=>'required'
               
            ],
            [
              
                
            ]
        );

       

        $customer = Customer::
        where('name', '=', $request->name)->first();
        // ->where('phone', '=', $request->phone)->get();

        //  echo $customer->name;
        //  echo $customer->phone;

        if(is_null($customer)){
            return redirect()->route('login');
        }
       

        if($customer->phone == $request->phone)
        {
            return redirect()->route('product.list'); 
        }
        else{
            return redirect()->route('login');
        }
       
         
        

    }
}
