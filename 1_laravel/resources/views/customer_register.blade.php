@extends('layouts.main')

@section('myContact')

    <h1>THis is Customer Register </h1>
    <hr>
    <form action="{{url('postMethod/10')}} " method="post">
        {{-- @csrf --}}
        {{ csrf_field()}}
        Name : <input type="text" name="userName"><br>
        Age : <input type="number" name="userAge"><br>
        Address : <input type="text" name="userAddress"><br>
        Gender
        <select name="userGender">
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select>
        <button type="submit"> Click to post </button>
    </form>
@endsection

{{--  --}}
