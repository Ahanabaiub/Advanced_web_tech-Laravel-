@extends('layouts.app')
@section('content')
   <h1 align="center">Order Management</h1>
    
   <!-- Nav....... -->
  
   <br>

   <table class="table table-borded" >
        <tr>
            <th>Order Id</th>
            <th>Ordered By</th>
            <th>Orderd At</th>
            <th>Status</th>
            <th>Delivery Man</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($orders as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->customer->user->username}}</td>
                <td>{{$c->created_at}}</td>
                <td>{{$c->status}}</td>
                <td>{{$c->deliveryMan->name}}</td>
                <td><a class="btn btn-success" href="/order/details/{{$c->id}}">Details</a></td>
                <td><a class="btn btn-danger" href="/order/delete/{{$c->id}}">Cancell</a></td>
            </tr>
        @endforeach

    </table>
   
@endsection