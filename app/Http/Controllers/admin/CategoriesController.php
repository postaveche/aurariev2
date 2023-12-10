<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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
        $categories = Category::orderBy('category_id')->get();
        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all = Category::orderBy('category_id')->get();
        return view('admin.categories.create', [
            'categories' => $all,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required|string|unique:categories|max:255',
            'name_ro' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'desc_ro' => 'max:255',
            'desc_ru' => 'max:255',
            'key_ro' => 'max:255',
            'key_ru' => 'max:255',
            'category_id' => 'required|integer',
        ]);
        //dd($request);
        $category = new Category();
        $category->slug = $request->slug;
        $category->name_ro = $request->name_ro;
        $category->name_ru = $request->name_ru;
        $category->desc_ro = $request->desc_ro;
        $category->desc_ru = $request->desc_ru;
        $category->key_ro = $request->key_ro;
        $category->key_ru = $request->key_ru;
        $category->category_id = $request->category_id;
        $category->save();
        return redirect()->back()->withSuccess('Categoria a fost adaugata cu succes!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryinfo = Category::where('id', $id)->get();
        $categories = Category::orderBy('category_id')->get();;
        return view('admin.categories.edit',[
            'categoryinfo' =>$categoryinfo,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'slug' => 'required|string|max:255',
            'name_ro' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'desc_ro' => 'max:255',
            'desc_ru' => 'max:255',
            'key_ro' => 'max:255',
            'key_ru' => 'max:255',
            'category_id' => 'required|integer',
        ]);
        $category = Category::find($id);
        $category->slug = $request->slug;
        $category->name_ro = $request->name_ro;
        $category->name_ru = $request->name_ru;
        $category->desc_ro = $request->desc_ro;
        $category->desc_ru = $request->desc_ru;
        $category->key_ro = $request->key_ro;
        $category->key_ru = $request->key_ru;
        $category->category_id = $request->category_id;
        $category->update();
        return redirect()->back()->withSuccess('Categoria a fost modificată cu succes!!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
