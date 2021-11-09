@extends('layouts.app')
@section('content')
<h1 align="center">Product History</h1>
<br>


<table>
    <tr>
        <th>Sold </th>
        <td>: {{$sold}} Units Total</td>
    </tr>
    <tr>
        <th>Tota Sell Price</th>
        <td>: {{$total}} BDT</td>
    </tr>
</table>
<br>    
<h2 align="center">Order History</h2>
   <table class="table table-borded" >
        <tr>
            <th>Order Id</th>
            <th>Ordered By</th>
            <th>Orderd At</th>
            <th>Status</th>
            <th></th>
            <th></th>
        </tr>

        @foreach($orders as $o)

            @foreach($AllOrders as $c)
                
                @if($o == $c->id)
                
                    <tr>
                        <td>{{$c->id}}</td>
                        <td>{{$c->customer->user->username}}</td>
                        <td>{{$c->created_at}}</td>
                        <td>{{$c->status}}</td>
                        <td><a class="btn btn-success" href="/order/details/{{$c->id}}">Details</a></td>
                        @if($c->status=='Ordered')
                            
                            <td><a class="btn btn-danger" href="/order/cancell/{{$c->id}}">Cancell</a></td>
                            
                        @endif          
                    </tr>
                
                @endif
           
            @endforeach
        @endforeach

      

    </table>
@endsection