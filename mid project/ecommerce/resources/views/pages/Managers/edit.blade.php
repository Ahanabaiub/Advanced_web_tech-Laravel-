@extends('layouts.app')
@section('content')
   <h1 align="center">Manager Management</h1>
    
   <h3 align="center">Create Manager</h3>
<form  action="{{route('manager.editsubmit')}}" style="margin-left: 300px" method="post">
        <!-- Cross Site Request Forgery-->
        {{csrf_field()}}
       <input type="hidden" name="id" value="{{$manager->id}}">
        <div class="col-md-6 form-group">
            <span>User Name</span>
            <input type="text" name="username" value="{{$manager->user->username}}" class="form-control">
            @error('username')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <span>Password</span>
            <input type="text" name="password" value="{{$manager->user->password}}"class="form-control">
            @error('password')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <span>Email</span>
            <input type="text" name="email" value="{{$manager->user->email}}" class="form-control">
            @error('email')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <span>Full Nmae</span>
            <input type="text" name="name" value="{{$manager->name}}"class="form-control">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <span>phone</span>
            <input type="text" name="phone" value="{{$manager->phone}}"class="form-control">
            @error('phone')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
       
        <div class="col-md-6 form-group">
            <span>Salary</span>
            <input type="text" name="salary" value="{{$manager->salary}}"class="form-control">
            @error('salary')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
     
        <br>
        <input type="submit" class="btn btn-success" value="Add" >
    </form>
@endsection