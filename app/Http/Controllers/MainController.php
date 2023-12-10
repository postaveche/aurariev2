<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MainController extends Controller
{
    public function main(){
        $recomandat = $this->recomandat();
        return view('pages.home', [
            'recomandat' => $recomandat,
        ]);
    }

    public function recomandat(){
        $recomandat = Product::inRandomOrder()->limit(4)->get();
        return $recomandat;
    }
}
