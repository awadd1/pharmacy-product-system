<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\ProductPharmacy;
use App\Models\Pharmacy;
use App\Models\Product;


class SearchCheapestPharmacies extends Command
{
    protected $signature = 'products:search-cheapest {id}';

    protected $description = 'Get the cheapest 5 pharmacies for a specific product';

    public function handle()
    {
        $productId = $this->argument('id');
        $product = Product::find($productId);
    
        if (!$product) {
            $this->error("No product found with ID {$productId}.");
            return;
        }
    
        $pharmacies = Pharmacy::join('product_pharmacy', 'pharmacies.id', '=', 'product_pharmacy.pharmacy_id')
        ->where('product_pharmacy.product_id', $productId)
        ->orderBy('product_pharmacy.price', 'asc')
        ->select('pharmacies.id', 'pharmacies.name', 'product_pharmacy.price')
        ->limit(5)
        ->get();
    
        if ($pharmacies->isEmpty()){
            $this->info("No pharmacies found for product ID {$productId}.");
        }else{
            $this->info($pharmacies->toJson(JSON_PRETTY_PRINT));
        }
    }
    
}