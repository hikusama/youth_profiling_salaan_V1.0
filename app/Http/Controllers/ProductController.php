<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function dashboard()
    {
        $products = Product::all();
        return view('dashboard', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        Product::create($data);

        return redirect(route('dashboard'));
    }



    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }
    
    public function delete(Product $product)
    {
        $product->delete();
        return redirect(route('dashboard'))->with('success','Product deleted successfully');
    }

    public function update(Product $product,Request $request) {

        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $product->update($data);
        return redirect(route('dashboard'))->with('success','Product updated successfully');

    }
}
