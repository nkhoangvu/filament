<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoTang;
use App\Http\Requests\MoTangRequest;


class MoTangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MoTang::leftJoin('ngkhoa_kieumotang', 'ngkhoa_motang.MaKieuMoTang', '=', 'ngkhoa_kieumotang.MaKieuMoTang')
            ->select('ngkhoa_motang.*', 'ngkhoa_kieumotang.KieuMoTang as KieuMoTang')
            ->get();

        return view('/backend/motang/index', compact('data') );    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/backend/motang/create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MoTangRequest $request)
    {
        $input = $request->validated(); 
       
        $data =  MoTang::create($input);

        return redirect()->route('motang.index')->with('success', ' [' . $data->NoiMoTang . '] '. trans('common.create_success'));
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
        $data = MoTang::findOrFail($id);

        return view('/backend/motang/edit', compact('data') );    
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
        
        $input = $request->validated(); 
       
        $data = MoTang::findOrFail($id);
        
        $data->update($input);   
        
        return redirect()->route('chucvi.index')->with('success', ' [' .$data->Ho.' '. $data->TenDem .' '. $data->Ten . '] '. trans('common.update_success'));	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
