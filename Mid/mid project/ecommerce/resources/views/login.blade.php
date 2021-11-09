<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
        <title>Login</title>
    </head>
    <body style="background-color: #e3f2fd">
      
       <div class="container">
            
<form method="post" action="{{route('login.submit')}}">
<h3>Login page</h3>
@if(isset($f))
<h4 class="text text-danger">{{ $f }}</h4>
@else
@endif
    <!-- Cross Site Request Forgery-->
    {{csrf_field()}}
    
    <div class="col-md-5 form-group">
        <br>
        <h4 align="left">Username</h4>
    <input type="text" name="username" value="{{old('username')}}" class="form-control">
    @error('username')
    <span class="text-danger">{{$message}} </span>
    @enderror
    </div> 

    <div class="col-md-5 form-group">
        <h4 align="left">Password</h4>
        <input type="password" name="password" value="{{old('password')}}" class="form-control">
        @error('password')
        <span class="text-danger">{{$message}} </span>
        @enderror
    </div>
    <div class="col-md-5 form-group">
        <br>
        <input style="width:250px" type="submit" class="btn btn-primary" value="Login" >
    </div>
    <br>
    <hr>
    <h5 style="color:black;">new here?</h5>
    <div class="col-md-5 form-group">
        
        <a style="width:250px" href="{{}}" class="btn btn-info" >Register</a>
    </div>
</form>
           
       </div>
    </body>
</html>