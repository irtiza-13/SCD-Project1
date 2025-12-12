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

    public function search(Request $request)
    {
        $query = $request->input('query');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $searchTerm = str_replace(['%', '_'], ['\%', '\_'], $query);

        $results = Product::where(function($q) use ($searchTerm) {
                        $q->where('name', 'LIKE', "%{$searchTerm}%")
                          ->orWhere('category', 'LIKE', "%{$searchTerm}%");
                    })
                    ->limit(10)
                    ->get(['id', 'name', 'category', 'price', 'image', 'rating', 'description']);

        return response()->json($results);
    }

    /**
     * API — Return all products
     */
    public function apiAll()
    {
        return response()->json(Product::all(), 200);
    }

    /**
     * API — Get single product
     */
    public function apiShow($id)
    {
        return response()->json(Product::findOrFail($id), 200);
    }

    /**
     * API — Store new product
     */
    public function apiStore(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    /**
     * API — Update product
     */
    public function apiUpdate(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json($product, 200);
    }

    /**
     * API — Delete product
     */
    public function apiDelete($id)
    {
        Product::destroy($id);
        return response()->json(['message' => 'Product deleted'], 200);
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
            'image'       => 'required|url',
        ]);

        Product::create($request->only([
            'name', 'description', 'category', 'price', 'rating', 'image'
        ]));

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully!');
    }

    /**
     * ADMIN — Edit Form
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
