<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Category;
use App\Models\Paragraph;
use App\Http\Requests\PageRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 
use Exception;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = Page::all();
       
       return view('/backend/page/index', compact('data') );  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/backend/page/create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $input = $request->validated(); 
        $published = $request->boolean('published');
			
		if($published == 1) {
			$input['published'] = 1;
		}
        else {
			$input['published'] = 0;
		}

        $data =  Page::create($input);

        if ($request->slug != null) {
            $slug = Str::lower($request->slug);
            $data->slug = $slug;
            $data->save();
        }
        
        $data->seo->update([
            'title' => $request->seo_title,
            'description' => $request->seo_description,
        ]);    

        return redirect()->route('page.index')->with('success',  ' [' . $data->title . '] '. trans('common.create_success'));	
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Page::findOrFail($id);
        
        return view('/backend/page/edit', compact('data') );  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        $data = Page::find($id);
        $input = $request->validated(); 
        $published = $request->boolean('published');
			
		if($published == 1) {
			$input['published'] = 1;
		}
        else {
			$input['published'] = 0;
		}

        $data -> update($input); 

        if ($request->slug != null) {
            $slug = Str::lower($request->slug);
            $data->slug = $slug;
            $data->save();
        }
        
        $data->seo->update([
            'title' => $request->seo_title,
            'description' => $request->seo_description,
        ]);

        return redirect()->route('page.show', [$data->id])->with('success',  ' [' . $data->title . '] ' .  trans('common.update_success'));	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Page::find($id);
        $check = Paragraph::where('paragraphs.page_id', $data->id)->first();
        
        if ($check == null) {
            $data->delete();
            return redirect()->route('page.index')->with('success',  ' [' . trans('ad_cms.page') . '] '. trans('common.delete_success'));	
        }
        else {
            return redirect()->route('page.index')->with('failed',  ' [' . trans('ad_cms.page') . '] '. trans('common.delete_failed'));	
        }
    }

    public function show($id)
    {
        $data = Page::find($id);
        $category = Category::all();
        $para = Paragraph::where('paragraphs.page_id', $data->id)->get();
        //dd($data);
                    
        return view('/backend/page/detail', compact('data', 'para', 'category') );  
       
    }

}
