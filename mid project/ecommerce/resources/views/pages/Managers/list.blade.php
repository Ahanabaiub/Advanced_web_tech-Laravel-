@extends('layouts.app')
@section('content')
   <h1 align="center">Manager Management</h1>
    
   <!-- Nav....... -->
   <a href="/manager/create" class="btn btn-Info">Create</a>
   <br>

   <table class="table table-borded" >
        <tr>
            <th>Full Name</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Salary</th>
            <th>Phone</th>
            <th>Created</th>
            <th>Last Update</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($managers as $c)
            <tr>
                <td>{{$c->name}}</td>
                <td>{{$c->user->username}}</td>
                <td>{{$c->user->email}}</td>
                <td>{{$c->user->password}}</td>
                <td>{{$c->salary}}</td>
                <td>{{$c->phone}}</td>
                <td>{{$c->created_at}}</td>
                <td>{{$c->updated_at}}</td>
                <td><a class="btn btn-success" href="/manager/editg/{{$c->id}}">Edit</a></td>
                <td><a class="btn btn-danger" href="/manager/delete/{{$c->id}}">Delete</a></td>
            </tr>
        @endforeach

    </table>
   
@endsection