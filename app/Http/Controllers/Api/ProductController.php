<?php

namespace App\Http\Controllers\Api;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }
    
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201); 
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product, 200); 
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(null, 204);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('title', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->get();
        return response()->json($products);
    }
}