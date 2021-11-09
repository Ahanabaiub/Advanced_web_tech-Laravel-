<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    </head>
    <body style="background-color: #e3f2fd">
        @include('inc.nav')
       <div class="container">
       @include('inc.topnav')
            <div>
                @yield('content')
            </div>
       </div>
    </body>
</html>