<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="conteiner card">
    <table class="table table-dark table-hover">
        <tbody class="text-center">
            <tr>
                <td>id</td>
                <td>user</td>
                <td>descripsi</td>
                <td>stock</td>
                <td>price</td>
                <td>action</td>
            </tr>
            @foreach ($item as $item)
            <form action="/items/{{$item->id}}" method="POST">
                @csrf
                @method('PUT')
            <tr>
                <td><p class="mt-5"><input type="text" class="bg-dark text-center" name="id" value="{{$item->id}}" placeholder=""></p></td>
                <td><p class="mt-5"><input type="text" class="bg-dark text-center" name="name" value="{{$item->name}}" placeholder=""></p></td>
                <td><p class="mt-5"><input type="text" class="bg-dark text-center" name="desct" value="{{$item->desct}}" placeholder=""></p></td>
                <td><p class="mt-5"><input type="number" class="bg-dark text-center" name="stock" value="{{$item->stock}}" placeholder=""></p></td>
                <td><p class="mt-5"><input type="number" class="bg-dark text-center" name="price" value="{{$item->price}}" placeholder=""></p></td>
                <td><a href="/items/{{$item->id}}" class="btn btn-light " type="button">READ</a>
                    <button type="submit" class="btn btn-warning ">UPDATE</button>
                </form>
            <form action="/item/{{$item->id}}" method="POST">
                @csrf
                @method('DELETE')
                    <button type="submit" class="btn btn-danger">DELETE</button>
                </td>
                </tr>
            </form>

            @endforeach
        </tbody>
    </table>
</div>
<h1><a class="btn btn-primary" href="/items/create">CREAT</a></h1>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
