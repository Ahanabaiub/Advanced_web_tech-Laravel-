<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alluser;
use App\Models\Customer;

class customerController extends Controller
{
    //
    public function index(){

        $c = Customer::all();
        //echo $c[0]->user;
        return view('pages.Customers.allcustomer')->with('customers',$c);
        
        // $u = Alluser::where('type','=','customer')->get();
        // echo $u[0]->customer;
        //return view('pages.Customers.allcustomer')->with('users',$u);
    }

    public function create(){

        return view('pages.Customers.create');
    }

    public function edit(Request $req){

        $c = Customer::where('id',$req->id)->first();
        return view('pages.Customers.editcustomer')->with('customer',$c);


    }

    public function editSubmit(Request $req){

        

      

        $c = Customer::where('id',$req->id)->first();
        $c->name=$req->name;
        $c->address=$req->address;
        $c->phone=$req->phone;
        $c->updated_at = date("Y-m-d H:i:s");
        //$c->user->email = $req->email;
        //$c->user->username = $req->username;
        //$c->user->password = $req->password;
        //$c->user->type = $req->type;

        
        $c->save();

        //echo $c->user->username;

        $user = Alluser::where('id',$c->userId)->first();
        $user->username=$req->username;
        $user->password=$req->password;
        $user->type=$req->type;
        $user->email=$req->email;

        $user->save();

        return redirect()->route('customer.index');


    }

    public function delete(Request $req){

        $c = Customer::where('id',$req->id)->first();
        $u = Alluser::where('id',$c->userId)->first();

        $c->delete();
        $u->delete();

        return redirect()->route('customer.index');


    }

    public function save(Request $req){

        $validate = $req->validate([
            'username'=>'required|min:4|max:10',
            'name'=>'required|min:6|max:15',
            'password'=>'required|min:3|max:10',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'email'
        ],
        [
            'name.required'=>'Please put your name',
            'name.min'=>'Name must be greater than 2 charcters'
        ]);


        $user = new Alluser();
        $user->username=$req->username;
        $user->password=$req->password;
        $user->type="customer";
        $user->email=$req->email;

        $user->save();

        $c = new Customer();
        $c->name=$req->name;
        $c->userId=$user->id;
        $c->address=$req->address;
        $c->phone=$req->phone;

        $c->save();

        return redirect()->route('customer.index');
    }
}
