@extends('pages.Customers.customerHome')
@section('section')
<h3 align="center">Create Customer</h3>
<form  action="/customer/edit" style="width: 1050px; margin-left: 300px" method="post">
        <!-- Cross Site Request Forgery-->
        {{csrf_field()}}
        <input Type="hidden" name="id" value="{{$customer->id}}">
        <div class="col-md-4 form-group">
            <span>User Name</span>
            <input type="text" name="username" value="{{$customer->user->username}}" class="form-control">
            @error('username')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <span>Password</span>
            <input type="text" name="password" value="{{$customer->user->password}}"class="form-control">
            @error('password')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <span>Email</span>
            <input type="text" name="email" value="{{$customer->user->email}}" class="form-control">
        </div>
        <div class="col-md-4 form-group">
            <span>Full Nmae</span>
            <input type="text" name="name" value="{{$customer->name}}"class="form-control">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <span>Address</span>
            <input type="text" name="address" value="{{$customer->address}}"class="form-control">
            @error('address')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
       
        <div class="col-md-4 form-group">
            <span>Phone</span>
            <input type="text" name="phone" value="{{$customer->phone}}"class="form-control">
            @error('phone')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <span>Status</span>
            <input type="text" name="status" value="{{$customer->status}}"class="form-control">
            @error('status')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <span>User Type</span>
            <input type="text" name="type" value="{{$customer->user->type}}" class="form-control">
            @error('type')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Edit" >
    </form>
@endsection