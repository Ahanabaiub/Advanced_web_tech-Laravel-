<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alluser;

class loginController extends Controller
{
    //
    public function login(){

        return view('login');

    }

    public function loginSubmit(Request $req){

        $user = Alluser::where('username',$req->username)
                        ->where('password',$req->password)->first();

        if($user){
            session()->put('user',$user->id);
            session()->put('utype',$user->type);
            return redirect()->route('admin.home');
        }  
        
        return redirect()->route('login');

    }

    public function  logout(Request $request){

        $request->session()->flush();

        return view('login');

    }

    
}
