<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Nguoi;
use App\Models\PhoiNgau;
use App\Models\DauRe;
use App\Models\Ngoai;
use App\Http\Requests\PhoiNgauRequest;

class PhoiNgauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $data = PhoiNgau::leftJoin('ngkhoa_loaiphoingau', 'ngkhoa_phoingau.MaLoaiPhoiNgau', '=', 'ngkhoa_loaiphoingau.MaLoaiPhoiNgau')
        ->leftJoin('ngkhoa_nguoi', 'ngkhoa_phoingau.MaNguoi', '=', 'ngkhoa_nguoi.MaNguoi')
        ->leftJoin('ngkhoa_daure', 'ngkhoa_phoingau.MaDauRe', '=', 'ngkhoa_daure.MaDauRe')
            ->select('ngkhoa_phoingau.MaPhoiNgau as MaPhoiNgau', 'ngkhoa_nguoi.*', 'ngkhoa_daure.Ten as TenPhoiNgau', 'ngkhoa_daure.Ho as HoPhoiNgau', 'ngkhoa_daure.TenDem as TenDemPhoiNgau', 'ngkhoa_daure.MaDauRE as MaDauRe', 'ngkhoa_loaiphoingau.TenLoaiPhoiNgau as TenLoaiPhoiNgau')
            ->get();
        
        return view('/backend/phoingau/index', compact('data') );    
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = auth()->user();
        $users = User::whereRoleIs('super-admin')->get();
        
        $data = Nguoi::find($id);
       
        
        if($data->MaNguoi != 1) {
            $Cha = DB::table('ngkhoa_nguoi')->where('ngkhoa_nguoi.MaNguoi', $data->MaCha)->first();
            $Me = DB::table('ngkhoa_daure')->where('ngkhoa_daure.MaDauRe', $data->MaMe)->first();
        }
        
        $DauReDaPhoiNgau = PhoiNgau::pluck('MaDauRe')->all();
        $DauRe = DauRe::whereNotIn('MaDauRe', $DauReDaPhoiNgau)->get();

        $PhoiNgau = PhoiNgau::where('ngkhoa_phoingau.MaNguoi', $id)
        ->leftJoin('ngkhoa_loaiphoingau', 'ngkhoa_phoingau.MaLoaiPhoiNgau', '=', 'ngkhoa_loaiphoingau.MaLoaiPhoiNgau')
        ->leftJoin('ngkhoa_daure', 'ngkhoa_phoingau.MaDauRe', '=', 'ngkhoa_daure.MaDauRe')
            ->select('ngkhoa_daure.*', 'ngkhoa_phoingau.MaPhoiNgau as MaPhoiNgau', 'ngkhoa_loaiphoingau.TenLoaiPhoiNgau as TenLoaiPhoiNgau')
            ->get();     
        
        return view('/backend/phoingau/create', compact('data', 'PhoiNgau', 'DauRe')); 
    }

    public function destroy($id)
    {
        $data = PhoiNgau::find($id); 
        $MaNguoi = $data->MaNguoi;
        $MaDauRe = $data->MaDauRe;
        $con = Nguoi::where('ngkhoa_nguoi.MaMe', $MaDauRe)->first();
        $ngoai = Ngoai::where('ngkhoa_ngoai.MaCha', $MaDauRe)->first();
        if(!isset($con) && !isset($ngoai)) {
        	$data->delete();           	
            return redirect()->route('phoingau.create', [$MaNguoi])->with('success', trans('ngkhoa.phoingau_xoathanhcong'));
        }
        else {
            return redirect()->route('phoingau.create', [$MaNguoi])->with('failes', trans('ngkhoa.phoingau_khongthexoa'));
        }

    }

    public function store($id, Request $request)
    {
   		$data = new PhoiNgau();
        $data->MaNguoi = $id;
        $data->MaDauRe = $request->MaDauRe;
        $data->MaLoaiPhoiNgau = $request->MaLoaiPhoiNgau;
      	$data->save();
    	
        return redirect()->route('phoingau.create', [$id])->with('success', trans('ngkhoa.phoingau_thanhcong'));
    }

}
