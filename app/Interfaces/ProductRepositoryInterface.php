<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function getProductById($id);
    public function searchProductsByName($name);
}