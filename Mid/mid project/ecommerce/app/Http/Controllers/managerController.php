<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;
use App\Models\Alluser;

class managerController extends Controller
{
    //
    public function index(){

        $c = Manager::all();
        
        return view('pages.Managers.list')->with('managers',$c);
        
    }

    public function create(){
        
        return view('pages.Managers.create');
        
    }

    public function save(Request $req){

        $validate = $req->validate([
            'username'=>'required|min:4|max:10',
            'name'=>'required|min:6|max:15',
            'password'=>'required|min:3|max:10',
            'salary' =>'required|numeric',
            'phone'=>'required|numeric|min:10',
            'email'=>'email'
        ],
        [
            'name.required'=>'Please put your Full name',
            'phone.min'=>'Phone should be 11 degeit'
            
        ]);


        $user = new Alluser();
        $user->username=$req->username;
        $user->password=$req->password;
        $user->type="manager";
        $user->email=$req->email;

        $user->save();

        $c = new Manager();
        $c->name=$req->name;
        $c->userId=$user->id;
        $c->phone=$req->phone;
        $c->salary=$req->salary;

        $c->save();

        return redirect()->route('manager.index');
    }

    
    public function delete(Request $req){

        $c = Manager::where('id',$req->id)->first();
        $u = Alluser::where('id',$c->userId)->first();

        $c->delete();
        $u->delete();

        return redirect()->route('manager.index');


    }

    public function edit(Request $req){

        $c = Manager::where('id',$req->id)->first();
        return view('pages.Managers.edit')->with('manager',$c);


    }

    public function editSubmit(Request $req){

        $validate = $req->validate([
            'username'=>'required|min:4|max:10',
            'name'=>'required|min:6|max:15',
            'password'=>'required|min:3|max:10',
            'salary' =>'required|numeric',
            'phone'=>'required|numeric|min:10',
            'email'=>'email'
        ],
        [
            'name.required'=>'Please put your Full name',
            'phone.min'=>'Phone should be 11 degeit'
            
        ]);

        $c = Manager::where('id',$req->id)->first();
        $c->name=$req->name;
        $c->salary=$req->salary;
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
        $user->email=$req->email;

        $user->save();


        return redirect()->route('manager.index');
    }
}
