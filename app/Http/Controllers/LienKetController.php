<?php

namespace App\Http\Controllers;

use App\Models\LienKet;
use App\Models\Nguoi;
use Illuminate\Support\Str;
use App\Http\Requests\LienKetRequest;

class LienKetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LienKet::all();
        
        return view('/backend/lienket/index', compact('data') );  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nguoi = Nguoi::all();

        return view('/backend/lienket/create', compact('nguoi') );  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(LienKetRequest $request)
    {
        $input = $request->validated(); 
    
        $data =  LienKet::create($input);       

        return redirect()->route('lienket.index')->with('success',  ' [' . trans('ngkhoa.lienket') . '] '. trans('common.create_success'));	
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
        $data = LienKet::findOrFail($id);
        
        $nguoi = Nguoi::all();
        
        return view('/backend/lienket/edit', compact('data', 'nguoi') );  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LienKetRequest $request, $id)
    {
        $data = LienKet::find($id);
        $input = $request->validated(); 
        
        $data -> update($input); 
        
        return redirect()->route('lienket.index', [$data->id])->with('success',  ' [' . trans('ngkhoa.lienket') . '] '. $data->title . trans('common.update_success'));	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = LienKet::find($id);
        
        $data->delete();

        return redirect()->route('lienket.index')->with('success',  ' [' . trans('ngkhoa.lienket') . '] '. trans('common.delete_success'));	
    }
}
