<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        // $data = $request->validate([
        //     'name' => 'required',
        //     'qty' => 'required|numeric',
        //     'price' => 'required|decimal:2',
        //     'description' => 'nullable'
        // ]);

        $newProduct = new Product();
        $newProduct->name = $request->name;
        $newProduct->qty = $request->qty;
        $newProduct->price = $request->price;
        $newProduct->description = $request->description;
        $newProduct->save();
        return redirect(route('product.index'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:2',
            'description' => 'nullable'
        ]);

        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product deleted successfully');
    }
}