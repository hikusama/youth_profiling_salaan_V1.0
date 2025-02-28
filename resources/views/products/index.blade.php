<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <style>
        table {
            border-collapse: collapse
        }
    </style>
</head>

<body>
    <h1>Products</h1>
    <div>
        @if (session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>
    <a href="{{ route('product.create') }}">Create new</a>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>QTY</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <button>

                            <a href="{{ route('product.edit', ['product' => $product]) }}">Edit</a>
                        </button>
                        <form action="{{ route('product.delete', ['product' => $product]) }}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
