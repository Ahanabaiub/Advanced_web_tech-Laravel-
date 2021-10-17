@extends('layouts.app')
@section('content')
    <table class="table table-borded">
        <tr>
            <th>Name</th>
            <th>Price</th>  
            <th>Option</th>
        </tr>
        @foreach($products as $p)
            <tr>
                <td>{{$p->name}}</td>
                <td>{{$p->price}}</td>
                <td>
                    <a href="#" class="btn btn-success">Remove</a>
            
                </td>
            </tr>
        @endforeach
    </table>
    <a href="" class="btn btn-info">Check Out</a>
@endsection