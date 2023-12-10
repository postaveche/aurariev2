<?php

namespace App\Http\Controllers\API\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function all_products(){
        $all_products = Product::all();
        $all_products = json_encode($all_products);
        return $all_products;
    }
}
