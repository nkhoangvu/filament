<?php

namespace App\Http\Controllers;

use App\Models\PhongTang;
use App\Models\Nguoi;
use App\Models\DauRe;
use App\Http\Requests\PhongTangRequest;
use Illuminate\Http\Request;

class PhongTangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PhongTang::leftJoin('ngkhoa_nguoi', 'ngkhoa_phongtang.MaNguoi', '=', 'ngkhoa_nguoi.MaNguoi')
        ->select('ngkhoa_phongtang.*', 'ngkhoa_nguoi.Ten as Ten', 'ngkhoa_nguoi.TenDem as TenDem', 'ngkhoa_nguoi.Ho as Ho')
        ->get();

        return view('/backend/phongtang/index', compact('data') );    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/backend/phongtang/create' );   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhongTangRequest $request)
    {
        $input = $request->validated(); 
       
        $data =  PhongTang::create($input);

        return redirect()->route('phongtang.index')->with('success', ' [' . $data->TenChucVi . '] '. trans('common.create_success'));
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
        $data = PhongTang::findOrFail($id);

        return view('/backend/phongtang/edit', compact('data') );    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhongTangRequest $request, $id)
    {
        $input = $request->validated(); 
       
        $data = PhongTang::findOrFail($id);
        
        $data->update($input);   
        
        return redirect()->route('phongtang.index')->with('success', ' [' .$data->Ho.' '. $data->TenDem .' '. $data->Ten . '] '. trans('common.update_success'));	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PhongTang::findOrFail($id); 

        if(isset($data->MaNguoi)) {
             return redirect()->route('phongtang.index')->with('failed', ' [' .$data->Ho.' '. $data->TenDem .' '. $data->Ten . '] '. trans('common.delete_failed'));	
        }
        else {
             $data->delete();
             return redirect()->route('phongtang.index')->with('success', ' [' .$data->Ho.' '. $data->TenDem .' '. $data->Ten . '] '. trans('common.delete_success'));	
        }
    }

    public function assign($id)
    {
        $data = Nguoi::find($id);
        
        if($data->root == 1) {
            $Cha = null;
            $Me = null;
        }
        else {
            $Cha = Nguoi::find($data->MaCha);
            $Me = DauRe::find($data->MaMe);
            }

        $PhongTang = PhongTang::where('ngkhoa_phongtang.MaNguoi', null)->get();

        $PhongTang_DN = PhongTang::where('ngkhoa_phongtang.MaNguoi', $id)->get();
        
        return view('/backend/phongtang/assign', compact('data', 'Cha', 'Me', 'PhongTang', 'PhongTang_DN'));	
    }

    public function add(Request $request, $id)
    {
     
        $MaPhongTang = $request->MaPhongTang;    
        $data = PhongTang::find($MaPhongTang);
        $data->MaNguoi = $request->MaNguoi; 
        $data->update();   
        //dd($data);

        return redirect()->route('phongtang.assign', [$request->MaNguoi])->with('success', trans('common.update_success'));	
    }

    public function remove($id)
    {
        
        $data = PhongTang::findOrFail($id); 
        $temp = $data->MaNguoi;
        
        $data->MaNguoi = null;
        $data->update();
        
        return redirect()->route('phongtang.assign', [$temp])->with('success', trans('common.update_success'));	
    }
}
