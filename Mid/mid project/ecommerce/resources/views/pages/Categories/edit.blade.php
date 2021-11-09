@extends('pages.Customers.customerHome')
@section('section')
<h3 align="center">Edit Category</h3>
<form  action="/category/edit" style="width: 1050px; margin-left: 300px" method="post">
        <!-- Cross Site Request Forgery-->
        {{csrf_field()}}
        <input Type="hidden" name="id" value="{{$category->id}}">
        <div class="col-md-4 form-group">
            <span>Category Name</span>
            <input type="text" name="name" value="{{$category->name}}" class="form-control">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
      
        <br>
        <input type="submit" class="btn btn-success" value="Edit" >
    </form>
@endsection