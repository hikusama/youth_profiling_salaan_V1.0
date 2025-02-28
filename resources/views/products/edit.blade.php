<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
</head>
<body> 
    <h1>Edit a product</h1>
    <form method="post" action="{{ route('product.update', ['product'=>$product]) }}" >
        @csrf
        @method('put')
        <li>
            <label for="">Name:</label>
            <input type="text" name="name" value="{{ $product->name }}" placeholder="Name.." >
        </li>
        <li>
            <label for="">Quantity:</label>
            <input type="text" name="qty" value="{{ $product->qty }}" placeholder="Quantity..">
        </li>
        <li>
            <label for="">Price:</label>
            <input type="text" name="price" value="{{ $product->price }}" placeholder="Price..">
        </li>
        <li>
            <label for="">Description:</label>
            <input type="text" name="description" value="{{ $product->description }}" placeholder="Description..">
        </li>
        <input type="submit" value="Update">
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