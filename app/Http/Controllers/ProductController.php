<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');
        $product   = new Product();
        $product->title       = $request->title;
        $product->description = $request->description;
        $product->image       = $imagePath;
        $product->price       = $request->price;
        $product->quantity    = $request->quantity;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'quantity'    => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $product->title       = $request->title;
        $product->description = $request->description;
        if ($request->hasFile('image')) {
            $imagePath      = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }
        $product->price    = $request->price;
        $product->quantity = $request->quantity;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('title', 'like', '%' . $query . '%')
                           ->orWhere('description', 'like', '%' . $query . '%')
                           ->get();
        return view('products.search', compact('products', 'query'));
    }
    
    public function show($id)
    {
        $product = Product::with('pharmacies')->findOrFail($id);
        return view('products.show', compact('product'));
    }
}