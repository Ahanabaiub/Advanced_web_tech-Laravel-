<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\auth_token;
use App\Models\Alluser;
use Illuminate\Support\Str;
use DateTime;


class apiLoginController extends Controller
{
    //
    public function login(Request $req){

        $user = Alluser::where('username',$req->username)->where('password',$req->password)->first();

        if($user){
            if($user->type!='admin'){
                return response('Only Admin Can Login',401);
            }

            $api_token=Str::random(64);
            $auth_token = new auth_token();
            $auth_token ->user_id = $user->id;
            $auth_token->token = $api_token;
            $auth_token->created_at = new DateTime();
            $auth_token->save();
            return $auth_token;
        }

        return response('Invalid username or password',401);

    }

    public function getuname(Request $req){
         $user = Alluser::where('id',$req->id)->first();

         return $user->username;
    }

     public function logout(Request $req){
          $token = $req->header("Authorization");
          $check_token = auth_token::where('token',$token)->first();

          $check_token->expired_at = new DateTime();
          $check_token->save();

          return $check_token;
    }
}
