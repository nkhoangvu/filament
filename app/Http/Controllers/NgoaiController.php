<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Ngoai;
use App\Models\Nguoi;
use App\Models\PhoiNgau;
use App\Http\Requests\NgoaiRequest;
use DateTime;

class NgoaiController extends Controller
{
    public function index()
    {     
        $data = Ngoai::all();
        $data1 = Ngoai::leftJoin('ngkhoa_nguoi', 'ngkhoa_ngoai.MaMe', '=', 'ngkhoa_nguoi.MaNguoi') 
        ->leftJoin('ngkhoa_daure', 'ngkhoa_ngoai.MaCha', '=', 'ngkhoa_daure.MaDauRe')
        ->select('ngkhoa_ngoai.*', 'ngkhoa_nguoi.Ten as TenMe', 'ngkhoa_nguoi.TenDem as TenDemMe', 'ngkhoa_nguoi.Ho as HoMe', 'ngkhoa_daure.Ten as TenCha', 'ngkhoa_daure.TenDem as TenDemCha', 'ngkhoa_daure.Ho as HoCha')
        ->get();
        
        return view('/backend/ngoai/index', compact('data') );    
    
    }

    public function create($id)
    {
        $user = auth()->user();
        $users = User::whereRoleIs('super-admin')->get();

        //if($user->hasPermission('nguoi-create')) {
        
        $Me = Nguoi::find($id);

        return view('/backend/ngoai/create', compact('Me') );    
    }

    public function store(NgoaiRequest $request)
    {
		$user = auth()->user();
		
		if($user == null) {
			abort(403);
		}
		else {
			$input = $request->validated(); 
			$input['user_id'] = $user->id;
		
			$data =  Ngoai::create($input);

			return redirect()->route('nguoi.index')->with('success', ' [' .$data->Ho.' '. $data->TenDem .' '. $data->Ten . '] '. trans('common.create_success'));	
		}
    }

    public function edit($id)
    {
        $user = auth()->user();
        $data = Ngoai::findOrFail($id); 
		
        if ($user->owns($data) || $user->hasRole('super-admin')) {
        $Me = Nguoi::where('ngkhoa_nguoi.MaNguoi', $data->MaMe)->first();

        return view('/backend/ngoai/edit', compact('data', 'Me') );  
		}
		else {
			abort(403);
		}
    }

    public function update(NgoaiRequest $request, $id)
    {
        $input = $request->validated(); 
        
        //dd($input);
        $data = Ngoai::findOrFail($id);
        
        $data->update($input);   
        
        return redirect()->route('ngoai.index')->with('success', ' [' .$data->Ho.' '. $data->TenDem .' '. $data->Ten . '] '. trans('common.update_success'));	
    }

    public function destroy($id)
    {   
        $data = Nguoi::findOrFail($id); 

        $data->delete();
        return redirect()->route('ngoai.index')->with('success', ' [' .$data->Ho.' '. $data->TenDem .' '. $data->Ten . '] '. trans('common.delete_success'));	

    }
}
