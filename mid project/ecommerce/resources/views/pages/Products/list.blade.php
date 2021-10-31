@extends('layouts.app')
@section('content')
<h1 align="center">Product Management</h1>
  
   <a class="btn btn-info" href="{{route('product.create')}}">Create</a>
   <h2>All Product</h2>
    <table class="table table-borded">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Created</th>
            <th>Last updated</th>
            <th>Option</th>
        </tr>
        @foreach($products as $p)
            <tr>
                <td><img src="{{$p->image}}" style="width:100px; hight:110px;"></td>
                <td>{{$p->name}}</td>
                <td>{{$p->unitPrice}}</td>
                <td>{{$p->quantity}}</td>
                <td>{{$p->details}}</td>
                <td>{{$p->created_at}}</td>
                <td>{{$p->updated_at}}</td>
                <td>
                    <a href="/product/edit/{{$p->id}}" class="btn btn-success">Edit</a><br>
                    <a href="/product/delete/{{$p->id}}" class="btn btn-danger">Delete</a>
                    <a href="/product/order/{{$p->id}}" class="btn btn-info">History</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

<?php 
    if(isset($_SESSION["cart"])){
        echo "session set";
    }
?>