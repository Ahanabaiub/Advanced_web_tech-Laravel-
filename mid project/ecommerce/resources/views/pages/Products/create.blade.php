@extends('layouts.app')
@section('content')
<h1 align="center">Product Management</h1>
<h2>Create Product</h2>
   <div style="margin-left:300px">
   <form action="{{route('product.save')}}" method="post">
        <!-- Cross Site Request Forgery-->
        {{csrf_field()}}
      
        <div class="col-md-6 form-group">
            <span>Name</span>
            <input type="text" name="name" value="{{old('name')}}" class="form-control">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <span>Unit Price</span>
            <input type="text" name="unitPrice" value="{{old('unitPrice')}}"class="form-control">
            @error('unitPrice')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <span>Quantity</span>
            <input type="text" name="quantity" value="{{old('quantity')}}" class="form-control">
            @error('quantity')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <span>Description</span>
            <input type="text" name="details" value="{{old('details')}}" class="form-control">
            @error('details')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <span>Image</span>
            <input type="text" name="image" value="{{old('image')}}" class="form-control">
            @error('image')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-6 form-group">
            <span>Category</span>
            <input type="text" name="categoryId" value="{{old('categoryId')}}" class="form-control">
            @error('categoryId')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Add" >
    </form>
   </div>
@endsection