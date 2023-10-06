<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Models\User;
use App\Models\Nguoi;
use App\Models\PhoiNgau;
use App\Models\DauRe;
use App\Models\Ngoai;
use App\Models\ChucVi;
use App\Models\PhongTang;
use App\Models\LienKet;
use App\Models\MoTang;
use App\Http\Requests\NguoiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use DateTime;



class NguoiController extends Controller
{
    
    // Method to get MaDoi options
    public function getMaDoiOptions()
    {
        $maDoiOptions = Nguoi::pluck('maDoi', 'maDoi')->unique();
        $maDoiOptionsHtml = '<option value="">-- Select MaDoi --</option>';

        foreach ($maDoiOptions as $maDoi) {
            $maDoiOptionsHtml .= "<option value=\"$maDoi\">$maDoi</option>";
        }

        return $maDoiOptionsHtml;
    }

    // Method to get MaNhanh options based on selected MaDoi
    public function getMaNhanhOptions(Request $request)
    {
        $maDoi = $request->input('maDoi');
        $maNhanhOptions = Nguoi::where('maDoi', $maDoi)->pluck('maNhanh', 'maNhanh')->unique();
        $maNhanhOptionsHtml = '<option value="">-- Select MaNhanh --</option>';

        foreach ($maNhanhOptions as $maNhanh) {
            $maNhanhOptionsHtml .= "<option value=\"$maNhanh\">$maNhanh</option>";
        }

        return $maNhanhOptionsHtml;
    }

    // Method to get Nguoi list based on selected MaDoi and MaNhanh
    public function getNguoiList(Request $request)
    {
        $maDoi = $request->input('maDoi');
        $maNhanh = $request->input('maNhanh');
        $nguoiList = Nguoi::where('maDoi', $maDoi)->where('maNhanh', $maNhanh)->get();
        $nguoiListHtml = '<option value="">-- Select Nguoi --</option>';

        foreach ($nguoiList as $nguoi) {
            $nguoiListHtml .= "<option value=\"$nguoi->MaNguoi\">$nguoi->Ho $nguoi->Ten</option>";
        }

        return $nguoiListHtml;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Nguoi::all();  

        return view('/backend/nguoi/index', compact('data') );    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = auth()->user();
        
        $Cha = Nguoi::find($id);
        
        $MaDoi = $Cha->MaDoi + 1;

        $MoTang = DB::table('ngkhoa_motang')
        ->leftJoin('ngkhoa_kieumotang', 'ngkhoa_motang.MaKieuMoTang', '=', 'ngkhoa_kieumotang.MaKieuMoTang')
            ->select('ngkhoa_motang.*', 'ngkhoa_kieumotang.KieuMoTang as TenKieuMoTang')->orderBy('TenKieuMoTang')->orderBy('NoiMoTang')->get();
        
        return view('/backend/nguoi/create', compact('Cha', 'MaDoi', 'MoTang') );    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NguoiRequest $request)
    {
		$user = auth()->user();
		
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
			if ($request->ChanDung != null) {
				$path = $request->file('ChanDung')->store('/storage/chandung');        
				$input['ChanDung'] = $path;
			}
			$input['user_id'] = $user->id;
			
			$data =  Nguoi::create($input);
			
			return redirect()->route('nguoi.index')->with('success', ' [' .$data->Ho.' '. $data->TenDem .' '. $data->Ten . '] '. trans('common.create_success'));	
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
        $data = Nguoi::find($id);
        
        if ($data->root != 1) {
            $Cha = Nguoi::where('ngkhoa_nguoi.MaNguoi', $data->MaCha)->select('ngkhoa_nguoi.*')->first();
            $Me = DauRe::where('ngkhoa_daure.MaDauRe', $data->MaMe)->select('ngkhoa_daure.*')->first();    
        }
        else {
            $Cha = null;
            $Me = null;
        }
        
        $PhoiNgau = $data->daure;
        
        $ChanhThat = $PhoiNgau->where('MaLoaiPhoiNgau', 1);
        
        if ($PhoiNgau->contains('MaLoaiPhoiNgau', 2)) {  
            $KeThat = $PhoiNgau->where('MaLoaiPhoiNgau', 2); 
        }
        else {
            $KeThat = null;
        }
        if ($PhoiNgau->contains('MaLoaiPhoiNgau', 3)) {  
            $ThuThat = $PhoiNgau->where('MaLoaiPhoiNgau', 3);
        }
        else {
                $ThuThat = null;
            }
        if ($PhoiNgau->contains('MaLoaiPhoiNgau', 4)) {
            $TracThat = $PhoiNgau->where('MaLoaiPhoiNgau', 4);
        }
        else {
            $TracThat = null;
        }
        if ($PhoiNgau->contains('MaLoaiPhoiNgau', 5)) {
            $YThat = $PhoiNgau->where('MaLoaiPhoiNgau', 5);
        }
        else {
            $YThat = null;
        }
        
        if($data->GioiTinh == 1)
            $Con = Nguoi::where('ngkhoa_nguoi.MaCha', $id)->select('ngkhoa_nguoi.*')->orderBy('ngkhoa_nguoi.ConThu')->get();
        else {
            $Con = Ngoai::where('ngkhoa_ngoai.MaMe', $id)->select('ngkhoa_ngoai.*')->orderBy('ngkhoa_ngoai.ConThu')->get();
        }
                
        return view('/backend/nguoi/show', compact('data', 'Cha', 'Me', 'PhoiNgau', 'ChanhThat', 'ThuThat', 'KeThat', 'TracThat', 'YThat', 'Con'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();

        //if($user->hasPermission('nguoi-create')) {
        $data = Nguoi::findOrFail($id); 

        $Cha = Nguoi::where('ngkhoa_nguoi.MaNguoi', $data->MaCha)->first();

        $MoTang = MoTang::all();
        
        return view('/backend/nguoi/edit', compact('data', 'Cha', 'MoTang') );    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NguoiRequest $request, $id)
    {
        $input = $request->validated(); 
        $routeName = Route::currentRouteName();
        
        if(isset($request->NgaySinhDL)) {
            $NgaySinhDL = DateTime::createFromFormat('d/m/Y', $request->NgaySinhDL)->format('Y-m-d');
            $input['NgaySinhDL'] = $NgaySinhDL;
        }
        
        if(isset($request->NgayMatDL)) {
            $NgayMatDL = DateTime::createFromFormat('d/m/Y', $request->NgayMatDL)->format('Y-m-d');
            $input['NgayMatDL'] = $NgayMatDL;
        }

        $data = Nguoi::findOrFail($id);

        if ($request->ChanDung != null) {
            if ($data->ChanDung != null) {
                $old_file = storage_path('app/public').'/'.$data->ChanDung;
		        if (Storage::exists($old_file)) {
		            Storage::delete($old_file);
		        }
            }
            
 	        $path = $request->file('ChanDung')->store('giapha');        
            $input['ChanDung'] = $path;
        }

        $data->update($input);   
        
        if($routeName == 'family.nguoiUpdate') {
            return redirect()->route('family.nguoiShow', [$id])->with('success', ' [' .$data->Ho.' '. $data->TenDem .' '. $data->Ten . '] '. trans('common.update_success'));	
        }
        else {
            return redirect()->route('nguoi.index')->with('success', ' [' .$data->Ho.' '. $data->TenDem .' '. $data->Ten . '] '. trans('common.update_success'));	
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
        
        $data = Nguoi::findOrFail($id); 
        $check = Nguoi::where('MaCha', $id)->first();

        if(isset($check)) {
            return redirect()->route('nguoi.index')->with('failed', ' [' .$data->Ho.' '. $data->TenDem .' '. $data->Ten . '] '. trans('common.delete_failed'));	
        }
        else {
            $data->delete();
            return redirect()->route('nguoi.index')->with('success', ' [' .$data->Ho.' '. $data->TenDem .' '. $data->Ten . '] '. trans('common.delete_success'));	
        }
    }
}
