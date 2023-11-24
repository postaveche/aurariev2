<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagsController extends Controller
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
        $tags = Tag::all();
        return view('admin.tags.index', [
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
        $tags = Tag::all();
        return view('admin.tags.create', [
            'tags' => $tags
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
            'name_ro' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'desc_ro' => 'max:255',
            'desc_ru' => 'max:255',
            'key_ro' => 'max:255',
            'key_ru' => 'max:255',
            'tag_id' => 'required|integer',
        ]);
        $tag = new Tag();
        $tag->name_ro = $request->name_ro;
        $tag->name_ru = $request->name_ru;
        $tag->desc_ro = $request->desc_ro;
        $tag->desc_ru = $request->desc_ru;
        $tag->key_ro = $request->key_ro;
        $tag->key_ru = $request->key_ru;
        $tag->tag_id = $request->tag_id;
        $tag->slug = Str::slug($request->name_ro);
        $tag->save();
        return redirect()->route('tags.index')->withSuccess('Tagul a fost adaugat cu succes!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->route('tags.index')->withSuccess('Tagul a fost sters cu succes!');
    }
}
