@extends('pages.Customers.customerHome')
@section('section')
<br>
<br>
<form action="{{route('customer.search')}}" method="post">
        {{csrf_field()}}
       <table>
           <tr>
               <td><input type="text" name="src"></td>
               <td><input type="submit" value="Search"></td>
           </tr>
       </table>
   </form>
   <br>

<table class="table table-borded" >
        <tr>
            <th>Full Name</th>
            <th>User Name</th>
            <th>Email</th>
           
            <th>Address</th>
            <th>Phone</th>
            <th>Created</th>
            <th>Last Update</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach($customers as $c)
            <tr>
                <td>{{$c->name}}</td>
                <td>{{$c->user->username}}</td>
                <td>{{$c->user->email}}</td>
              
                <td>{{$c->address}}</td>
                <td>{{$c->phone}}</td>
                <td>{{$c->created_at}}</td>
                <td>{{$c->updated_at}}</td>
                <td><a class="btn btn-success" href="/customer/edit/{{$c->id}}">Edit</a></td>
                <td><a class="btn btn-danger" href="/customer/delete/{{$c->id}}">Delete</a></td>
                <td>
                    <a class="btn btn-info" href="/customer/history/{{$c->id}}">History</a>
                    @if($c->status=='active')
                    <a class="btn btn-warning" href="/customer/block/{{$c->id}}">Block</a>
                    @endif

                    @if($c->status=='block')
                        <span style="color:#c62828">Blocked</span>
                    @endif
                </td>
            </tr>
        @endforeach

    </table>
@endsection