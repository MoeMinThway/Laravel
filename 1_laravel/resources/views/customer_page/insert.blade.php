
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Customer Register Page</h1>

    <form action="{{ route('customer#insert')}} " method="POST">
        @csrf
        Name : <input type="text" name="customerName" required ><br> <br>
        Address :  <textarea id="" cols="30" name="customerAddress" rows="10"></textarea> <br> <br>
        Phone : <input type="number" name="customerPhone" required> <br> <br>
        <input type="submit" value="Register ">
    </form>
</body>
</html>
{{--  --}}
