<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\auth_token;
use App\Models\Alluser;


class apiLoginController extends Controller
{
    //
    public function login(Request $req){

        $user = Alluser::where('username',$req->username)->where('password',$req->password)->get();

        if($user){
            $api_token=Str::random(64);
            $auth_token = new auth_token();
            $auth_token -> user_id = $user->id;
            $auth_token->token = $api_token;
            $auth_token->created_at = new DateTime();
            $auth_token->save();
            return $auth_token;
        }

        return "user not found";

    }
}
