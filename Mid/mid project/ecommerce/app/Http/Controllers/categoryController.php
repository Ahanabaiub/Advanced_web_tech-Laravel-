<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class categoryController extends Controller
{
    //
    public function index(){

        $c = Category::all();
        
        return $c;
        
    }
     public function count(){

        $c = Category::all()->count();
        
        return $c;
        
    }

    public function create(){

        return view('pages.Categories.create');
        
    }

   


    public function save(Request $req){

        $validate = $req->validate([
            'name'=>'required',
           
        ],
        [
            'name.required'=>'Please Give a Category name',
           
        ]);

        $c = new Category();
        $c->name = $req->name;

        $c->save();

        return redirect()->route('category.index');
        
    }

    public function delete(Request $req){

        $c = Category::where('id',$req->id)->first();
        $c->delete();
        return redirect()->route('category.index');
        
    }

    public function edit(Request $req){

        $c = Category::where('id',$req->id)->first();

        
        return view('pages.Categories.edit')->with("category",$c);
        
    }

    public function editSubmit(Request $req){

        $c = Category::where('id',$req->id)->first();

        $c->name = $req -> name;

        $c->save();
        
        return redirect()->route('category.index');
        
    }


}
