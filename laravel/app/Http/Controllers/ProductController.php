<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * FRONTEND — Show products page to users
     */
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    /**
     * API — Return all products (for AJAX/cart)
     */
    public function apiAll()
    {
        return Product::all();
    }

    /**
     * ADMIN — List products
     */
    public function adminIndex()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * ADMIN — Show Create Product Form
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * ADMIN — Store New Product
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'category'    => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'rating'      => 'required|numeric|min:1|max:5',
            'image'       => 'required|url', // Image URL
        ]);

        Product::create($request->only([
            'name', 'description', 'category', 'price', 'rating', 'image'
        ]));

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully!');
    }

    /**
     * ADMIN — Show Edit Form
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * ADMIN — Update Product
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'category'    => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'rating'      => 'required|numeric|min:1|max:5',
            'image'       => 'required|url',
        ]);

        $product = Product::findOrFail($id);

        $product->update($request->only([
            'name', 'description', 'category', 'price', 'rating', 'image'
        ]));

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
    }

    /**
     * ADMIN — Delete Product
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully!');
    }
}
