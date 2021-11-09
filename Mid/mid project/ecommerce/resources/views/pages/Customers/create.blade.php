@extends('pages.Customers.customerHome')
@section('section')
<h3 align="center">Create Customer</h3>
<form  action="{{route('customer.save')}}" style="margin-left: 300px" method="post">
        <!-- Cross Site Request Forgery-->
        {{csrf_field()}}
      
        <div class="col-md-6 form-group">
            <span>User Name</span>
            <input type="text" name="username" value="{{old('username')}}" class="form-control">
            @error('username')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <span>Password</span>
            <input type="text" name="password" value="{{old('password')}}"class="form-control">
            @error('password')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <span>Email</span>
            <input type="text" name="email" value="{{old('email')}}" class="form-control">
        </div>
        <div class="col-md-6 form-group">
            <span>Full Nmae</span>
            <input type="text" name="name" value="{{old('name')}}"class="form-control">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <span>Address</span>
            <input type="text" name="address" value="{{old('address')}}"class="form-control">
            @error('address')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
       
        <div class="col-md-6 form-group">
            <span>Phone</span>
            <input type="text" name="phone" value="{{old('phone')}}"class="form-control">
            @error('phone')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <!-- <div class="col-md-4 form-group">
            <span>User Type</span>
            <input type="text" name="type" value="{{old('type')}}" class="form-control">
            @error('type')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div> -->
        <br>
        <input type="submit" class="btn btn-success" value="Add" >
    </form>
@endsection