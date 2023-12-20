<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductTags;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(){
        $homecategories = Category::where('category_id', 0)->get();
        $categories = Category::orderBy('name_ro', 'asc')->get();
        $alltag = Tag::all();
        $product_id = ProductTags::paginate(12);
        $count_products = count($product_id);
        return view('pages.tags', [
            'homecategories' => $homecategories,
            'categories' => $categories,
            'products' => $product_id,
            'count_products' => $count_products,
            'alltags' => $alltag,
        ]);
    }

    public function showtag($slug){
        $homecategories = Category::where('category_id', 0)->get();
        $categories = Category::orderBy('name_ro', 'asc')->get();;
        $tag = Tag::where('slug', $slug)->first();
        $product_id = ProductTags::where('tag_id', $tag->id)->paginate(12);
        $count_products = count($product_id);
       // dd($product_id);
        return view('pages.tags', [
            'homecategories' => $homecategories,
            'categories' => $categories,
            'products' => $product_id,
            'count_products' => $count_products,
            'tag' => $tag,
        ]);
    }
}
