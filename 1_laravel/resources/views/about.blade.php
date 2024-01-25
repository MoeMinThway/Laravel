@extends('layouts.main')

@section('myContact')
    <h1>About page</h1>
   {{-- <h4> {{$message}}</h4>
   <h4> {{$result}}</h4> --}}
   <hr>

   {{-- Directive --}}
   @php
       echo "Hello Php";
   @endphp

    {{date("d m Y")}}

    @if (false)
        <h1>This is true</h1>
    @elseif (false)
        <h2>This is Else If </h2>
        <p>Else if</p>
    @else
         <h3>ELse</h3>
    @endif

    <hr>

    @for ($i = 1; $i <= 10;$i++)
        <h1> This is {{$i}} </h1>
    @endfor
    <hr>

    @for ($i = 1; $i < count($fruits);$i++)
        <h1> This is {{$fruits[$i]}} </h1>
    @endfor
    <hr>

    @foreach ($fruits as $fruit )
        <h1>The Fruits  are {{$fruit}} </h1>
    @endforeach
    <hr>
    {{-- Array   cannot be --}}
    {{-- {{$fruits}} --}}
<hr>
    @isset($name)
        <h1> {{$name}} </h1>
    @endisset

    <hr>
    @empty($nameEmpty)
        <h1>Name is Empty  </h1>
    @endempty

    <hr>

@endsection

