<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Product;
class ProductController extends Controller
{
    public function index(){
        $products = Product::where([
            ['active','=',1],
            ['deleted','=',0]
        ])->paginate(10);
        return $products;
    }

    public function findAll(){
        $products = Product::where([
            ['deleted','=',0]
        ])->paginate(15);
        return $products;
    }
}
