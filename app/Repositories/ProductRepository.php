<?php

namespace App\Repositories;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProductById($id)
    {
        return Product::findOrFail($id);
    }

    public function searchProductsByName($name)
    {
        return Product::where('title', 'like', '%' . $name . '%')->get();
    }
}