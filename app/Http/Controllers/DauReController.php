<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nguoi;
use App\Models\DauRe;
use App\Models\PhoiNgau;
use App\Models\MoTang;
use App\Http\Requests\DauReRequest;
use Illuminate\Support\Facades\Route;
use DateTime;


class DauReController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $data = DauRe::all();
       
        return view('/backend/daure/index', compact('data') );    
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
           
        $MoTang = MoTang::leftJoin('ngkhoa_kieumotang', 'ngkhoa_motang.MaKieuMoTang', '=', 'ngkhoa_kieumotang.MaKieuMoTang')
            ->select('ngkhoa_motang.*', 'ngkhoa_kieumotang.KieuMoTang as TenKieuMoTang')->orderBy('TenKieuMoTang')->orderBy('NoiMoTang')->get();

        return view('/backend/daure/create', compact('MoTang')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DauReRequest $request)
    {
        $user = auth()->user();
        $routeName = Route::currentRouteName();
		
		if($user == null) {
			abort(403);
		}
		else {
			$input = $request->validated(); 
			if(isset($request->NgaySinhDL)) {
				$NgaySinhDL = DateTime::createFromFormat('d/m/Y', $request->NgaySinhDL)->format('Y-m-d');
				$input['NgaySinhDL'] = $NgaySinhDL;
			}
			
			if(isset($request->NgayMatDL)) {
				$NgayMatDL = DateTime::createFromFormat('d/m/Y', $request->NgayMatDL)->format('Y-m-d');
				$input['NgayMatDL'] = $NgayMatDL;
			}
			$input['user_id'] = $user->id;
			
			$data =  DauRe::create($input);      
			
			if($routeName == 'family.daure.create') {
				return redirect()->route('daure.index')->with('success', ' [' .$data->Ho.' '. $data->TenDem .' '. $data->Ten . '] '. trans('common.create_success'));	
			}
			else {
				return redirect()->route('daure.index')->with('success', ' [' .$data->Ho.' '. $data->TenDem .' '. $data->Ten . '] '. trans('common.create_success'));	
			}
		}
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
        $data = DauRe::findOrFail($id);
        $MoTang = MoTang::leftJoin('ngkhoa_kieumotang', 'ngkhoa_motang.MaKieuMoTang', '=', 'ngkhoa_kieumotang.MaKieuMoTang')
            ->select('ngkhoa_motang.*', 'ngkhoa_kieumotang.KieuMoTang as TenKieuMoTang')->orderBy('TenKieuMoTang')->orderBy('NoiMoTang')->get();


        return view('/backend/daure/edit', compact('data', 'MoTang')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DauReRequest $request, $id)
    {
        $input = $request->validated(); 
        $user = auth()->user();
        $routeName = Route::currentRouteName();

        if(isset($request->NgaySinhDL)) {
            $NgaySinhDL = DateTime::createFromFormat('d/m/Y', $request->NgaySinhDL)->format('Y-m-d');
            $input['NgaySinhDL'] = $NgaySinhDL;
        }

        if(isset($request->NgayMatDL)) {
            $NgayMatDL = DateTime::createFromFormat('d/m/Y', $request->NgayMatDL)->format('Y-m-d');
            $input['NgayMatDL'] = $NgayMatDL;
        }

        $data = DauRe::where('ngkhoa_daure.MaDauRe', $id)->first();
        
        $data->update($input);   

        if($routeName == 'family.daureUpdate') {
            return redirect()->route('family.nguoiShow', [$user->nguoi->MaNguoi])->with('success', ' [' .$data->Ho.' '. $data->TenDem .' '. $data->Ten . '] '. trans('common.update_success'));	
        }
        else {
            return redirect()->route('daure.index')->with('success', ' [' .$data->Ho.' '. $data->TenDem .' '. $data->Ten . '] '. trans('common.update_success'));	
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //dd($id);
         $data = DauRe::findOrFail($id); 

         $check = PhoiNgau::where('MaDauRe', $id)->first();
         
         if(isset($check)) {
             return redirect()->route('daure.index')->with('failed', ' [' .$data->Ho.' '. $data->TenDem .' '. $data->Ten . '] '. trans('common.delete_failed'));	
         }
         else {
             $data->delete();
             return redirect()->route('daure.index')->with('success', ' [' .$data->Ho.' '. $data->TenDem .' '. $data->Ten . '] '. trans('common.delete_success'));	
         }
    }
}
