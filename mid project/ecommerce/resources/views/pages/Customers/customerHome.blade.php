@extends('layouts.app')
@section('content')
   <h1 align="center">Customer Management</h1>
    @include('pages.Customers.inc.customerNav')
    @yield('section')
   
@endsection