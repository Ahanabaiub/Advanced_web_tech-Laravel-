@extends('layouts.app')
@section('content')
   <h1 align="center">Order Management</h1>
    
   <!-- Nav....... -->
   
   <br>
   <?php $total=0; ?>

   <table class="table table-borded" >
       <tr>
           <td>Product Id</td>
           <td>Image</td>
           <td>Name</td>
           <td>Price</td>
           <td>Quantity</td>
           <td>Amount</td>
           
       </tr>
        @foreach($ods as $c)
            <tr>
                <td>{{$c->productId}}</td>
                <td><img src="{{$c->product->image}}" style="width:100px; hight:110px;"></td>
                <td>{{$c->product->name}}</td>
                <td>{{$c->product->unitPrice}}</td>
                <td>{{$c->productQuantity}}</td>
                <td>{{$c->productQuantity * $c->product->unitPrice}} BDT</td>
                
            </tr>
            <?php $total+=$c->product->unitPrice * $c->productQuantity ?>
        @endforeach
            <tr>
                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Total :</td>
                <td>{{$total}} BDT</td>
            </tr>
    </table>
   
@endsection