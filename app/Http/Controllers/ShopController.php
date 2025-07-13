<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryGroup;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::with('productImages')
        ->where('active', 1)
        ->where('deleted',0)
        ->orderBy('created_at','desc')
        ->paginate(10);

        $categoryGroups = CategoryGroup::where([
            ['active', '=', 1],
            ['deleted', '=', 0]
        ])->with('categories')->get();

        return view("shop", ["products" => $products, "categoryGroups" => $categoryGroups]);
    }
} 