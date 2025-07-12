<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryGroup;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::with('productImages')->where([
            ['active','=',1],
            ['deleted','=',0]
        ])->paginate(10);

        $categoryGroups = CategoryGroup::where([
            ['active','=',1],
            ['deleted','=',0]
        ])->with('categories')->get();

        return view("home", ["products"=> $products, "categoryGroups" => $categoryGroups]);
    }
}
