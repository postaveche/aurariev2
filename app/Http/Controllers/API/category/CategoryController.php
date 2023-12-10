<?php

namespace App\Http\Controllers\API\category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function allcategory(){
        $category = Category::all();
        $category = json_encode($category);
        return $category;
    }
}
