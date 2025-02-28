<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
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
                                        <button >
                                            <a href="{{ route('product.edit', ['product' => $product]) }}" class="bg-green-500 text-white p-2 rounded cursor-pointer">Edit</a>
                                        </button>
                                        <form  action="{{ route('product.delete', ['product' => $product]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete" class="bg-red-500 text-white p-2 rounded cursor-pointer">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
