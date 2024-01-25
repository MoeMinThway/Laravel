<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
    <a href="{{ url('home')}}">Home</a>
    <a href="{{ url('about')}}">About</a>
    <a href="{{ url('contact')}}">contact</a>
    {{-- <a href="{{ url('service')}}">Service</a> --}}
    <a href="{{ route('ser')}}">Service</a>
    <hr>


        @yield("myContact")
        {{-- <h1 style="background-color: yellow">This is yield method</h1> --}}
        {{-- @yield("footer") --}}
        {{-- <h3>The End</h3> --}}



        {{-- @yield('js') --}}


        {{-- js --}}
        {{-- @stack('stackPush') --}}
        <script src=" {{asset('js/app.js')}} "></script>
</body>
</html>
