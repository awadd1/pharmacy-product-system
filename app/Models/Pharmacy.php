<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    // الأعمدة القابلة للتحديث أو الإدخال
    protected $fillable = ['name', 'address'];

    // علاقة Many-to-Many مع المنتجات
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_pharmacy')
                    ->withPivot('price');
    }
    
    
}