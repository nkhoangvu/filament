<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Paragraph;
use App\Http\Requests\ParagraphRequest;

class ParagraphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $page = Page::find($id);
        return view('/backend/paragraph/create', compact('page') );  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParagraphRequest $request)
    {
        $input = $request->validated(); 
        $title_enable = $request->boolean('title_enable');            
        if($title_enable == 1) {
            $input['title_enable'] = 1;
        }
        else {
            $input['title_enable'] = 0;
        }

        $data =  Paragraph::create($input);       

        return redirect()->route('page.show', [$data->page_id])->with('success',  trans('common.paragraph') . ' [' . $data->title . '] '. trans('common.create_success'));	
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Paragraph::find($id);
        $page = Page::find($data->page_id);
        
        return view('backend.paragraph.edit', compact('data', 'page') );  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParagraphRequest $request, $id)
    {
        $data = Paragraph::find($id);
        $input = $request->validated(); 
        $title_enable = $request->boolean('title_enable');            
        if($title_enable == 1) {
            $input['title_enable'] = 1;
        }
        else {
            $input['title_enable'] = 0;
        }
        
        $data -> update($input); 
        
        return redirect()->route('page.show', [$data->page_id])->with('success',  trans('common.paragraph') . ' [' . $data->title . '] ' . trans('common.update_success'));	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Paragraph::find($id);   
        $title = $data->title;
        $page_id = $data->page_id;
        
        $data->delete();
        return redirect()->route('page.show', [$page_id])->with('success',  trans('common.paragraph') . ' [' . $title . '] '. trans('common.delete_success'));	
    }
}
