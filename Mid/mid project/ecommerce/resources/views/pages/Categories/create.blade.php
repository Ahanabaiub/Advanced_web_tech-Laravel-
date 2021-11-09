@extends('layouts.app')
@section('content')
   <h1 align="center">Category Management</h1>
   <h2>Create Category</h2>
 <div style="width: 70%">
 <form  action="{{route('category.save')}}"  method="post">
        <!-- Cross Site Request Forgery-->
        {{csrf_field()}}
      
        <div class="col-md-4 form-group">
            <span>Category Name</span>
            <input type="text" name="name" value="{{old('name')}}" class="form-control">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
      
        <br>
        <input type="submit" align="left" class="btn btn-success" value="Add" >
    </form>
   
 </div>
@endsection