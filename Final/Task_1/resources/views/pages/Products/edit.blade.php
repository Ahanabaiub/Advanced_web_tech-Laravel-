@extends('layouts.app')
@section('content')
    <form action="{{route('product.edit')}}" class="col-md-6" method="post">
        <!-- Cross Site Request Forgery-->
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$product->id}}">
        <div class="col-md-4 form-group">
            <span>Name</span>
            <input type="text" name="name" value="{{$product->name}}" class="form-control">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <span>Price</span>
            <input type="text" name="price" value="{{$product->price}}"class="form-control">
            @error('id')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-4 form-group">
            <span>Quantity</span>
            <input type="text" name="quantity" value="{{$product->quantity}}" class="form-control">
        </div>
        <div class="col-md-4 form-group">
            <span>Description</span>
            <input type="text" name="description" value="{{$product->description}}" class="form-control">
        </div>
    
        <input type="submit" class="btn btn-success" value="Edit" >
    </form>
@endsection