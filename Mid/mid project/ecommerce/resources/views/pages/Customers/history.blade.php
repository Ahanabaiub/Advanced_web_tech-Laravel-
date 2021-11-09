@extends('layouts.app')
@section('content')
   <h1 align="center">Customer Management</h1>
   <h2 align="center">Order History</h2>
   

<table>
    <tr>
        <th>Customer Name</th>
        <td>: {{$c->name}}</td>
    </tr>
    <tr>
        <th>Total Order</th>
        <td>: {{sizeof($orders)}}</td>
    </tr>
</table>
<br>
   
   <table class="table table-borded" >
        <tr>
            <th>Order Id</th>
            <th>Orderd At</th>
            <th>Status</th>
            <th>Delivery Man</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($orders as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->created_at}}</td>
                <td>{{$c->status}}</td>
                <td>{{$c->deliveryMan->name}}</td>
                <td><a class="btn btn-success" href="/order/details/{{$c->id}}">Details</a></td>
                @if($c->status=='Ordered')
                
                    <td><a class="btn btn-danger" href="/order/cancell/{{$c->id}}">Cancell</a></td>
                
                @endif
            </tr>
        @endforeach

    </table>
@endsection