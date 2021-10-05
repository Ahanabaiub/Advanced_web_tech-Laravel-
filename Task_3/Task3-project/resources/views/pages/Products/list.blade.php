@extends('layouts.app')
@section('content')
    <table class="table table-borded">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Description</th>
        
            <th>Option</th>
        </tr>
        @foreach($products as $p)
            <tr>
                <td>{{$p->name}}</td>
                <td>{{$p->price}}</td>
                <td>{{$p->quantity}}</td>
                <td>{{$p->description}}</td>
                <td>
                    <a href="/product/edit/{{$p->id}}" class="btn btn-success">Edit</a>
                    <a href="/product/delete/{{$p->id}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection