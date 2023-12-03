<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Tag;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        $tags = Tag::all();
        return view('admin.products.index',[
            'categories' => $categories,
            'products' => $products,
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.products.create', [
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $last_id = Product::latest()->first()->id;
        $next_id = $last_id + 1;
        $validated = $request->validate([
            'name_ro' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'desc_ro' => 'max:255',
            'desc_ru' => 'max:255',
            'key_ro' => 'max:255',
            'key_ru' => 'max:255',
            'category_id' => 'required|integer',
            'cod' => 'required|max:255',
            'price' => 'required|integer',
            'promo_price' => 'integer',
            'cantitate' => 'required|integer',
            'image_thumb' => 'required|mimes:png,jpg,jpeg|max:8096',
            'images' => 'required|max:8096',
            'full_desc_ro' => 'max:20000',
            'full_desc_ru' => 'max:20000',
        ]);
        $product = new Product();
        $product->slug = $next_id . '-' . Str::slug($request->name_ro);
        $product->name_ro = $request->name_ro;
        $product->name_ru = $request->name_ru;
        $product->desc_ro = $request->desc_ro;
        $product->desc_ru = $request->desc_ru;
        $product->key_ro = $request->key_ro;
        $product->key_ru = $request->key_ru;
        $product->cod = $request->cod;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->promo_price = $request->promo_price;
        $product->cantitate = $request->cantitate;
        if ($request->hasFile('image_thumb')) {
            $name = $product->slug . '_' . $next_id . '.' . $request->image_thumb->extension();
            $request->image_thumb->storeAs('public/products_thumb/', $name);
            $data = $name;
        }
        $product->image_thumb = $data;
        if ($request->hasFile('images')){
            $i = 1;
            foreach ($request->file('images') as $product_file){
                $name = $product->slug.'_'.$i.'_'.$next_id.'.'.$product_file->extension();
                $product_file->storeAs('public/products/', $name);
                $i = $i + 1;
                $data_img[] = $name;
            }
        }
        $product->images = json_encode($data_img);
        $product->images_qty = $i-1;
        $product->full_desc_ro = $request->full_desc_ro;
        $product->full_desc_ru = $request->full_desc_ru;
        $product->active = $request->active;
        $product->save();
        return redirect()->back()->with('success', 'Produsul a fost adaugat cu succes!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::where('id', $id)->get();
        $product_image = json_decode($product[0]->images);
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories,
            'product_images' => $product_image
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->slug = $request->slug;
        $product->name_ro = $request->name_ro;
        $product->name_ru = $request->name_ru;
        $product->desc_ro = $request->desc_ro;
        $product->desc_ru = $request->desc_ru;
        $product->key_ro = $request->key_ro;
        $product->key_ru = $request->key_ru;
        $product->cod = $request->cod;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->promo_price = $request->promo_price;
        $product->cantitate = $request->cantitate;
        if ($request->hasFile('image_thumb')) {
            if(Storage::exists('public/products_thumb/'.$product->image_thumb)) {
                Storage::delete('public/products_thumb/' . $product->image_thumb);
            }
            $name = $product->slug . '_' . $id . '.' . $request->image_thumb->extension();
            $request->image_thumb->storeAs('public/products_thumb/', $name);
            $data = $name;
            $product->image_thumb = $data;
        }
        if ($request->hasFile('images')){
            $i = 1;
            $old_file = json_decode($product->images);
            foreach ($old_file as $file){
                if(Storage::exists('public/products/'.$file)) {
                    Storage::delete('public/products/' . $file);
                }
            }
            foreach ($request->file('images') as $product_file){
                $name = $product->slug.'_'.$i.'_'.$id.'.'.$product_file->extension();
                $product_file->storeAs('public/products/', $name);
                $i = $i + 1;
                $data_img[] = $name;
            }
            $product->images = json_encode($data_img);
            $product->images_qty = $i-1;
        }
        $product->full_desc_ro = $request->full_desc_ro;
        $product->full_desc_ru = $request->full_desc_ru;
        $product->active = $request->active;
        $product->save();
        return redirect()->route('products.index')->with('success', 'Produsul a fost adaugat cu succes!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
