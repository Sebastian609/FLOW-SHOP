<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "name",
        "slug",
        "price",
        "discount_price",
        "description",
        "active",
        "deleted"
    ];

    public function productImages()
    {
        return $this->hasMany(ProductImages::class);
    }
}
