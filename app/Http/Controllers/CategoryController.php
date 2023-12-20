<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index(){
        $homecategories = Category::where('category_id', 0)->get();
        $categories = Category::orderBy('name_ro', 'asc')->get();
        $products = Product::orderBy('id', 'desc')->paginate(12);
        $recomandat = Product::inRandomOrder()->limit(4)->get();
        $count_products = Product::count();
        return view('pages.categories', [
            'homecategories' => $homecategories,
            'categories' => $categories,
            'products' => $products,
            'recomandat' => $recomandat,
            'count_products' => $count_products,
        ]);
    }

    public function category($slug){
        $homecategories = Category::where('category_id', 0)->get();
        $categories = Category::orderBy('name_ro', 'asc')->get();;
        $category = Category::where('slug', $slug)->get();
        if ($category[0]->category_id === '0'){
            dd($category[0]->id);
        }
        else{
            $products = Product::where('category_id', $category[0]->id)->orderBy('id', 'desc')->paginate(12);
        }
        $recomandat = Product::inRandomOrder()->limit(4)->get();
        $count_products = Product::where('category_id', $category[0]->id)->count();
        return view('pages.categories', [
            'homecategories' => $homecategories,
            'categories' => $categories,
            'products' => $products,
            'recomandat' => $recomandat,
            'count_products' => $count_products,
            'curent_category' => $category
        ]);
    }
}
