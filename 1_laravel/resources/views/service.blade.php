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
    <h1>This is service Page</h1>
    {{$num1}} +{{$num2}} = {{$num1+$num2}}
    {{$name}}
</body>
</html> --}}
@extends('layouts.main')


@section('myContact')


<h1>This is service Page</h1>
    {{-- {{$num1}} +{{$num2}} = {{$num1+$num2}}
    {{$name}} --}}
@endsection
