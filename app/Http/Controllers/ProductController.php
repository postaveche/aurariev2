<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
            return view('pages.products', [
                'product' => $product,
                'images' => $images,
                'discount' => $discount,
                'recomandat' => $recomandat,
            ]);
        }
    }

    public function discount($price, $promo_price){
        $discount = round((($price - $promo_price) * 100) / $price, 2);
        return $discount;
    }

    public function recomandat(){
        $recomandat = Product::inRandomOrder()->limit(4)->get();
        return $recomandat;
    }
}
