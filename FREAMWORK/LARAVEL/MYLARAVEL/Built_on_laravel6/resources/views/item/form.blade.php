<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/items" method="POST">
        @csrf
        {{-- <label>Username<br><input type="text" name="username"></label><br> --}}
        <label>name<br><input type="text" name="name"></label><br>
        <label>desct<br><input type="text" name="desct"></label><br>
        <label>stock<br><input type="number" name="stock"></label><br>
        <label>price<br><input type="number" name="price"></label><br>
<button type="submit">Here</button>
    </form>
</body>
</html>
