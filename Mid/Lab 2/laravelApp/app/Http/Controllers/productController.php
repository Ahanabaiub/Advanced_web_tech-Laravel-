<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productController extends Controller
{
    public function allProduct(){
        $products = array('Watch','Shoe','Tv','Mobile','Gagets');

        return view('allProducts')->with('products',$products);
    }

    public function ourTerms(){
        return view('ourTerms');
    }

    public function aboutUs(){
        return view('aboutUs');
    }

    public function contactUsI(){
        $contact = "017665432";
        return view('contactus')->with('contact',$contact);
    }
}
