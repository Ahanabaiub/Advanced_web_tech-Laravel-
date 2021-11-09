<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="/">Home</a>

    <h1>All products</h1>

    <table>
            @foreach($products as $n)
            <tr><td>{{$n}}</td></tr> 
            @endforeach
    </table>
    
</body>
</html>