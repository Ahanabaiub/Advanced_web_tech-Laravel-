<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryMan;

class deliveryManController extends Controller
{
    //

    public function index(){
        $c = DeliveryMan::all();
        return $c;
    }

     public function count(){
        $c = DeliveryMan::all()->count();
        return $c;
    }
}
