<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class homeController extends Controller
{
    //

    public function home(){

        return view('pages.home');

    }

    public function create(Request $req){

        $var = new Customer();

        $var->name = $req->name;

        $var->phone = $req->phone;

        $var->save();

        echo "hello";

        //return view('pages.login');

    }
}
