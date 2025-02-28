<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <style>
        form{
            display: grid;
            width: 10rem
        }
        form input{
            margin-bottom:1rem; 
        }
        li{
            list-style: none;
        }
    </style>
</head>
<body>
    <h1>Create Products</h1>
    <form action="{{ route('product.store') }}" method="post">
        @csrf
        @method('post')
        <li>
            <label for="">Name:</label>
            <input type="text" name="name" placeholder="Name..">
        </li>
        <li>
            <label for="">Quantity:</label>
            <input type="text" name="qty" placeholder="Quantity..">
        </li>
        <li>
            <label for="">Price:</label>
            <input type="text" name="price" placeholder="Price..">
        </li>
        <li>
            <label for="">Description:</label>
            <input type="text" name="description" placeholder="Description..">
        </li>
        <input type="submit" value="Create a New Product">
    </form>
    <div>
        @if($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>

        @endif
    </div>
</body>
</html>