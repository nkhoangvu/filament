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
use App\Http\Requests\NguoiRequest;
use Illuminate\Support\Facades\Route;
use DateTime;



class GiaDinhController extends Controller
{
    /*  treeView */
    public function private_treeView($data_tree) 
    {       
        //$data_tree = Nguoi::where('MaCha', 0)->get();
        $tree='<ul id="browser" class="text-sm"><li class="tree-view"></li>';
        foreach ($data_tree as $Nguoi) {
             $tree .='<li class="tree-view closed"><a class="tree-name" href="/gia-dinh/'.$Nguoi->MaNguoi.'"> '.$Nguoi->Ho.' '.$Nguoi->TenDem.' '.$Nguoi->Ten.'</a> ('.$Nguoi->MaNhanh.'/'.$Nguoi->MaDoi.')';
            if(count($Nguoi->children)) {
                $tree .=$this->childView($Nguoi);
            }
        }
        $tree .='<ul>';
    
        return $tree;
    }

    /* childView of treeView  */
    public function childView($Nguoi){
        $source ='<ul>';
    
        foreach ($Nguoi->children as $Con) {
            if(count($Con->children)) {
                $source .='<li class="tree-view closed"><a class="tree-name" href="/gia-dinh/'.$Con->MaNguoi.'">'.$Con->Ho.' '.$Con->TenDem.' '.$Con->Ten.'</a> ('.$Con->MaNhanh.'/'.$Con->MaDoi.')';                  
                $source.= $this->childView($Con);
            } 
            else 
            {
                $source .='<li class="tree-view closed"><a class="tree-name" href="/gia-dinh/'.$Con->MaNguoi.'">'.$Con->Ho.' '.$Con->TenDem.' '.$Con->Ten.'</a> ('.$Con->MaNhanh.'/'.$Con->MaDoi.')';                                 
                $source .="</li>";
            }                           
        }
        
        $source .="</ul>";
        return $source;
    }    
    
    public function nguoiList()
    {
        $pageTitle = 'Trang gia đình';
        $pageDescription = 'Trang Thông tin và Gia phả';
		$pageAuthor = 'Dòng họ Nguyễn Khoa';
        $user = auth()->user();
		
		if($user == null) {
			abort(403);
		}
        $data = Nguoi::where('user_id', $user->id)->get();
        $data_tree = Nguoi::where('user_id', $user->id)->with('allChildren')->get();
            
        $tree = $this->private_treeView($data_tree);

        return view('/frontend/giadinh/nguoiList', compact('data', 'tree', 'pageTitle', 'pageDescription', 'pageAuthor'));   
    }

    public function daureList()
    {
        $pageTitle = 'Trang gia đình';
        $pageDescription = 'Trang Thông tin và Gia phả';
		$pageAuthor = 'Dòng họ Nguyễn Khoa';
        $user = auth()->user();
		
		if($user == null) {
			abort(403);
		}
        $data = DauRe::where('user_id', $user->id)->get();
        $data_tree = Nguoi::where('user_id', $user->id)->with('allChildren')->get();
            
        $tree = $this->private_treeView($data_tree);

        return view('/frontend/giadinh/daureList', compact('data', 'tree', 'pageTitle', 'pageDescription', 'pageAuthor'));   
    }


    public function nguoiShow($id)
    {
        $user = auth()->user();
		
		if($user == null) {
			abort(403);
		}
		$data = Nguoi::findOrFail($id); 
		
        $pageTitle = 'Trang gia đình';
        $pageDescription = 'Trang Thông tin và Gia phả';
		$pageAuthor = 'Dòng họ Nguyễn Khoa';

        if ($user->owns($data)) {
            
            $data = Nguoi::find($id);

            $PhoiNgau = PhoiNgau::where('ngkhoa_phoingau.MaNguoi', $data->MaNguoi)
                ->leftJoin('ngkhoa_daure', 'ngkhoa_phoingau.MaDauRe', '=', 'ngkhoa_daure.MaDauRe')
                ->leftJoin('ngkhoa_motang', 'ngkhoa_daure.MaMoTang', '=', 'ngkhoa_motang.MaMoTang')
                ->leftJoin('ngkhoa_kieumotang', 'ngkhoa_motang.MaKieuMoTang', '=', 'ngkhoa_kieumotang.MaKieuMoTang')
                    ->select('ngkhoa_phoingau.*', 'ngkhoa_daure.*', 'ngkhoa_kieumotang.KieuMoTang as KieuMoTang','ngkhoa_motang.NoiMoTang as NoiMoTang')->get();

            $data_tree = Nguoi::where('user_id', $user->id)->with('allChildren')->get();
            $tree = $this->private_treeView($data_tree);
            $Cha = Nguoi::where('ngkhoa_nguoi.MaNguoi', $data->MaCha)->first();
    
            $MoTang = DB::table('ngkhoa_motang')
            ->leftJoin('ngkhoa_kieumotang', 'ngkhoa_motang.MaKieuMoTang', '=', 'ngkhoa_kieumotang.MaKieuMoTang')
                ->select('ngkhoa_motang.*', 'ngkhoa_kieumotang.KieuMoTang as TenKieuMoTang')->orderBy('TenKieuMoTang')->orderBy('NoiMoTang')->get();

            return view('/frontend/giadinh/index', compact('data', 'Cha', 'MoTang', 'PhoiNgau', 'tree', 'pageTitle', 'pageDescription', 'pageAuthor'));   
        }
        else {
            return redirect()->back()->with('error','Bạn chưa có quyền truy cập nội dung này. Vui lòng liên hệ quản trị viên.');
        }
    
    }

    public function nguoiEdit($id)
    {
        $user = auth()->user();
		
		if($user == null) {
			abort(403);
		}
		
        $pageTitle = 'Trang gia đình';
        $pageDescription = 'Trang Thông tin và Gia phả';
		$pageAuthor = 'Dòng họ Nguyễn Khoa';
        
        $data = Nguoi::findOrFail($id); 

        if ($user->owns($data)) { 
            $data_tree = Nguoi::where('user_id', $user->id)->with('allChildren')->get();
            
            $tree = $this->private_treeView($data_tree);
    
            $Cha = Nguoi::where('ngkhoa_nguoi.MaNguoi', $data->MaCha)->first();
    
            $MoTang = DB::table('ngkhoa_motang')
            ->leftJoin('ngkhoa_kieumotang', 'ngkhoa_motang.MaKieuMoTang', '=', 'ngkhoa_kieumotang.MaKieuMoTang')
                ->select('ngkhoa_motang.*', 'ngkhoa_kieumotang.KieuMoTang as TenKieuMoTang')->orderBy('TenKieuMoTang')->orderBy('NoiMoTang')->get();
              
            return view('/frontend/giadinh/nguoi', compact('data', 'tree', 'Cha', 'MoTang', 'pageTitle', 'pageDescription', 'pageAuthor') );        
        }
        else {
            return redirect()->back()->with('error','Bạn chưa có quyền truy cập nội dung này. Vui lòng liên hệ quản trị viên.');
        }
    }

    public function daureEdit($id)
    {
        $user = auth()->user();
        $pageTitle = 'Trang gia đình';
        $pageDescription = 'Trang Thông tin và Gia phả';
		$pageAuthor = 'Dòng họ Nguyễn Khoa';

        $data = DauRe::findOrFail($id); 

        if ($user->owns($data)) { 
            $data_tree = Nguoi::where('user_id', $user->id)->with('allChildren')->get();
                
            $tree = $this->private_treeView($data_tree);

            $MoTang = DB::table('ngkhoa_motang')
            ->leftJoin('ngkhoa_kieumotang', 'ngkhoa_motang.MaKieuMoTang', '=', 'ngkhoa_kieumotang.MaKieuMoTang')
                ->select('ngkhoa_motang.*', 'ngkhoa_kieumotang.KieuMoTang as TenKieuMoTang')->orderBy('TenKieuMoTang')->orderBy('NoiMoTang')->get();
            
            return view('/frontend/giadinh/daure', compact('data', 'tree', 'MoTang', 'pageTitle', 'pageDescription', 'pageAuthor') );    
        }
        else {
            return redirect()->back()->with('error','Bạn chưa có quyền truy cập nội dung này. Vui lòng liên hệ quản trị viên.');
        }
    }
}
