<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use Spatie\Tags\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tag::all();
        
        return view('backend.tag.index', compact('data'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {       
        return view('backend.tag.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $input = $request->validated(); 
        
        $tag = Tag::findOrCreateFromString($request->name);

        return redirect()->route('tag.index')->with('success', trans('common.tag') . ' [' . $tag->name .'] '. trans('common.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $tag)
    {
        $data = Tag::find($tag);

        return view('backend.tag.edit', compact('data')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, string $id)
    {
        $input = $request->validated(); 
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();
        
        return redirect()->route('tag.index')->with('success', trans('common.tag') . ' [' . $tag->name .'] '. trans('common.create_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
