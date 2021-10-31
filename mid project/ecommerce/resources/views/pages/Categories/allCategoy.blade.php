@extends('layouts.app')
@section('content')
   <h1 align="center">Category Management</h1>
   <h2>All Category</h2>
   <a class="btn btn-info" href="{{route('category.create')}}">Create</a>
   <table class="table table-borded" >
        <tr>
            <th>Category Name</th>
            <th>Created</th>
            <th>Last Updated</th>
            <th></th>
        </tr>
        @foreach($categories as $c)
            <tr>
                <td>{{$c->name}}</td>
                <td>{{$c->created_at}}</td>
                <td>{{$c->updated_at}}</td>
                <td><a class="btn btn-success" href="/category/edit/{{$c->id}}">Edit</a></td>
                <td><a class="btn btn-danger" href="/category/delete/{{$c->id}}">Delete</a></td>
            </tr>
        @endforeach

    </table>
   
@endsection