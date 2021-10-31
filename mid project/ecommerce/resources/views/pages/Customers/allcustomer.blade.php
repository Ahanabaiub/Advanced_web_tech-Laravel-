@extends('pages.Customers.customerHome')
@section('section')
<table class="table table-borded" >
        <tr>
            <th>Full Name</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Created</th>
            <th>Last Update</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($customers as $c)
            <tr>
                <td>{{$c->name}}</td>
                <td>{{$c->user->username}}</td>
                <td>{{$c->user->email}}</td>
                <td>{{$c->user->password}}</td>
                <td>{{$c->address}}</td>
                <td>{{$c->phone}}</td>
                <td>{{$c->created_at}}</td>
                <td>{{$c->updated_at}}</td>
                <td><a class="btn btn-success" href="/customer/edit/{{$c->id}}">Edit</a></td>
                <td><a class="btn btn-danger" href="/customer/delete/{{$c->id}}">Delete</a></td>
            </tr>
        @endforeach

    </table>
@endsection