<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // الأعمدة القابلة للتحديث أو الإدخال
    protected $fillable = ['title', 'description', 'image', 'quantity'];

    // علاقة Many-to-Many مع الصيدليات
    public function pharmacies()
    {
        return $this->belongsToMany(Pharmacy::class, 'product_pharmacy')
                    ->withPivot('price');
    }
    
    
}