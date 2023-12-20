<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addtocart(Request $request){
        $product_id = $request->product_id;
        $cantitate = $request->cantitate;
        $product = Product::where('id', $product_id)->get();
        if ($product[0]->cantitate > 0){
            if (auth()->check()){
                $user = auth()->user();
                if ($user->carts()->where('products_id', $product_id)->exists()) {
                    $product_cart = $user->carts()->where('products_id', $product_id)->first();
                   // dd($product_cart);
                    $product_cart->products_id = $product_id;
                    $product_cart->cantitate = $product_cart->cantitate + $cantitate;
                    $product_cart->update();
                    //dd($product_cart);
                }
                else {
                    $cart = new Cart();
                    $cart->user_id = Auth::user()->id;
                    $cart->products_id = $product_id;
                    $cart->cantitate = $cantitate;
                    $cart->save();
                }
            }
            else {
                $cart = $request->session()->get('cart', []);
                if (isset($cart[$product_id])) {
                    $cart[$product_id] = $cart[$product_id] + $cantitate;
                } else {
                    $cart[$product_id] = $cantitate;
                }
                $request->session()->put('cart', $cart);
            }
            return redirect()->back()->with('succes', 'Produsul a fost adăugat cu succes în coșul de cumpărături');
        }
        else{
            return redirect()->back()->with('error', 'A apărut o Erroare și produsul nu a fost adăugat în coș');
        }
    }

    public function show_card(){
        if (auth()->check()){
            $user_id = Auth::user()->id;
            $products = Cart::where('user_id', $user_id)->get();
            //dd($products);
        }
        else{
            $products = session::get('cart');
           // $products = (object)$products;
           // dd($products);
        }
        return view('users.cart', [
            'products' =>$products,
            'total_price' => '0',
            'item_nr' => '0',0.
        ]);
    }

    public function update_cantitate(Request $request, $product_id){
        if (auth()->check()){
            $user_id = Auth::user()->id;
            $cart_product = Cart::where('user_id', $user_id)->where('products_id', $product_id)->first();
            if ($request->cantitate == null or $request->cantitate == '0'){
                $request->cantitate = 1;
            }
            $cart_product->cantitate = $request->cantitate;
            $cart_product->update();
            return redirect()->back()->with('succes', 'Coșul a fost revizuit cu succes!');
        }
        else{
            return redirect()->back()->with('error', 'A apărut o Erroare și coșul nu a fost modificat');
        }
    }

    public function product_remove($product_id){
        if (auth()->check()){
            $cart_product = Cart::findorfail($product_id);
            $cart_product->delete();
            return redirect()->back()->with('succes', 'Produsul a fost șters cu succes din coș!');
        }
    }
}
