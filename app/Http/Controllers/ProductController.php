<?php

namespace App\Http\Controllers;

use App\Models\ProductTags;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tag;

class ProductController extends Controller
{
    public function product($slug){
        $product = Product::where('slug', $slug)->get();
        if ($product->isEmpty()){
            abort(404);
        }
        else{
            $images = json_decode($product[0]->images);
            if ($product[0]->promo_price <> null or $product[0]->promo_price <> ''){
                $discount = $this->discount($product[0]->price, $product[0]->promo_price);
            }
            else{
                $discount = '';
            }
            $recomandat = $this->recomandat();
            $tags = ProductTags::where('product_id', $product[0]->id)->get();
            return view('pages.products', [
                'product' => $product,
                'images' => $images,
                'discount' => $discount,
                'recomandat' => $recomandat,
                'tags' => $tags,
            ]);
        }
    }

    public function discount($price, $promo_price){
        $discount = round((($price - $promo_price) * 100) / $price, 0);
        return $discount;
    }

    public function recomandat(){
        $recomandat = Product::inRandomOrder()->limit(4)->get();
        return $recomandat;
    }
}
