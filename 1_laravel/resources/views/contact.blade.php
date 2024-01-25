{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ url('home')}}">Home</a>
    <a href="{{ url('about')}}">About</a>
    <a href="{{ url('contact')}}">contact</a>
    <a href="{{ url('service')}}">Service</a>
    <hr>
    <h1>THis is contact page</h1>
</body>
</html>
 --}}

 @extends('layouts.main')

 @section(
    'myContact'
 )
     <h1>THis is contact page</h1>


 @endsection
