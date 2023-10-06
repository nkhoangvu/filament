<?php

namespace App\Http\Controllers;

use App\Models\ChucVi;
use App\Models\Nguoi;
use App\Models\DauRe;
use App\Http\Requests\ChucViRequest;
use Illuminate\Http\Request;

class ChucViController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ChucVi::leftJoin('ngkhoa_nguoi', 'ngkhoa_chucvi.MaNguoi', '=', 'ngkhoa_nguoi.MaNguoi')
            ->select('ngkhoa_chucvi.*', 'ngkhoa_nguoi.Ten as Ten', 'ngkhoa_nguoi.TenDem as TenDem', 'ngkhoa_nguoi.Ho as Ho')
            ->get();

        return view('/backend/chucvi/index', compact('data') );    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/backend/chucvi/create' );   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChucViRequest $request)
    {
        $input = $request->validated(); 
        $data =  ChucVi::create($input);

        return redirect()->route('chucvi.index')->with('success', ' [' . $data->TenChucVi . '] '. trans('common.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ChucVi::findOrFail($id);

        return view('/backend/chucvi/edit', compact('data') );    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChucViRequest $request, $id)
    {
        $data = ChucVi::findOrFail($id);
        
        $input = $request->validated();
        $data->update($input); 

        return redirect()->route('chucvi.index')->with('success', ' [' . $data->TenChucVi . '] '. trans('common.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ChucVi::findOrFail($id); 
        $TenChucVi = $data->TenChucVi;
        if(isset($data->MaNguoi)) {
             return redirect()->route('chucvi.index')->with('failed', ' [' . $TenChucVi . '] '. trans('common.delete_failed'));	
        }
        else {
             $data->delete();
             return redirect()->route('chucvi.index')->with('success', ' [' . $TenChucVi . '] '. trans('common.delete_success'));	
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

        $ChucVi = ChucVi::where('ngkhoa_chucvi.MaNguoi', null)->get();

        $ChucVi_DN = ChucVi::where('ngkhoa_chucvi.MaNguoi', $id)->get();
        
        return view('backend.chucvi.assign', compact('data', 'Cha', 'Me', 'ChucVi', 'ChucVi_DN'));	
    }

    public function add(Request $request, $id)
    {
     
        $MaChucVi = $request->MaChucVi;    
        $data = ChucVi::find($MaChucVi);
        $data->MaNguoi = $request->MaNguoi; 
        $data->update();   
        //dd($data);

        return redirect()->route('chucvi.assign', [$request->MaNguoi])->with('success', trans('common.update_success'));	
    }

    public function remove($id)
    {
        
        $data = ChucVi::findOrFail($id); 
        $temp = $data->MaNguoi;
        
        $data->MaNguoi = null;
        $data->update();
        
        return redirect()->route('backend.chucvi.assign', [$temp])->with('success', trans('common.update_success'));	
    }

}
