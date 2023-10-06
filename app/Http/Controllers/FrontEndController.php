<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Tags\Tag;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Nguoi;
use App\Models\PhoiNgau;
use App\Models\DauRe;
use App\Models\Ngoai;
use App\Models\Category;
use App\Models\Page;
use App\Models\Paragraph;
use App\Models\BaiViet;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $data = Page::where('pages.slug', 'gioi-thieu')->first();
        $current = 'cur_home';
        $recents = BaiViet::published()->orderBy('created_at','desc')->take(5)->get();
        $nguoi = Nguoi::all()->count();
        $ngoai = Ngoai::all()->count();
        $daure = DauRe::all()->count();
        $doi = Nguoi::max('MaDoi');
        $nhanh = Nguoi::max('MaNhanh');
        $tatca = $nguoi + $daure + $ngoai;
        $categories = Category::withCount('baiviet')->get();
        $tags = Tag::all();
        
        return view('frontend.home', compact('data', 'current', 'tatca', 'doi', 'nhanh', 'categories', 'tags'));    
    }

   
    public function list()
    {       
        $pageTitle = "Thông tin gia phả";
        $user = auth()->user();
        $data = Nguoi::orderBy('MaDoi')->orderBy('MaNhanh')->get();

       return view('/frontend/list', compact('data', 'pageTitle') );    
    }

    public function show($id)
    {
        $user = auth()->user();
        
        $pageTitle = trans('ngkhoa.giapha');
        $data = Nguoi::find($id);
        $MaDoi = $data->MaDoi;
        $nguoi = $data->Ho.' '. $data->TenDem .' '. $data->Ten;
        
        $PhoiNgau = PhoiNgau::where('ngkhoa_phoingau.MaNguoi', $id)
            ->leftJoin('ngkhoa_daure', 'ngkhoa_phoingau.MaDauRe', '=', 'ngkhoa_daure.MaDauRe')
            ->leftJoin('ngkhoa_motang', 'ngkhoa_daure.MaMoTang', '=', 'ngkhoa_motang.MaMoTang')
            ->leftJoin('ngkhoa_kieumotang', 'ngkhoa_motang.MaKieuMoTang', '=', 'ngkhoa_kieumotang.MaKieuMoTang')
                ->select('ngkhoa_phoingau.*', 'ngkhoa_daure.*', 'ngkhoa_kieumotang.KieuMoTang as KieuMoTang','ngkhoa_motang.NoiMoTang as NoiMoTang')->get();
             
        if($data->MaDoi < 7) {
            $data_tree = Nguoi::where('MaDoi', 1)->where('MaDoi','<', 8)->orderBy('ConThu')->get();
        }
        else {
            $data_tree = Nguoi::where('MaNguoi', $data->cha->MaCha)->with('allChildren')->get();
        }
        
        $tree = $this->treeView($data_tree);
        $SEOData = new SEOData(title: $nguoi, description: $nguoi .' - Đời thứ '. $MaDoi .' - Gia phả họ Nguyễn Khoa');
        if($MaDoi >10 && $user == null) {
            abort(403);
        }
        else {
            return view('frontend.tree', compact('data', 'PhoiNgau', 'tree', 'SEOData'));   
        }
    }
    
    /*  treeView */
    public function treeView($data_tree){       
        //$data_tree = Nguoi::where('MaCha', 0)->get();
        $tree='<ul id="browser" class="text-sm"><li class="tree-view"></li>';
        foreach ($data_tree as $Nguoi) {
             $tree .='<li class="tree-view closed"><a class="tree-name" href="/gia-pha/'.$Nguoi->MaNguoi.'"> '.$Nguoi->Ho.' '.$Nguoi->TenDem.' '.$Nguoi->Ten.'</a> ('.$Nguoi->MaNhanh.'/'.$Nguoi->MaDoi.')';
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
                $source .='<li class="tree-view closed"><a class="tree-name" href="/gia-pha/'.$Con->MaNguoi.'">'.$Con->Ho.' '.$Con->TenDem.' '.$Con->Ten.'</a> ('.$Con->MaNhanh.'/'.$Con->MaDoi.')';                  
                $source.= $this->childView($Con);
            } 
            else 
            {
                $source .='<li class="tree-view closed"><a class="tree-name" href="/gia-pha/'.$Con->MaNguoi.'">'.$Con->Ho.' '.$Con->TenDem.' '.$Con->Ten.'</a> ('.$Con->MaNhanh.'/'.$Con->MaDoi.')';                                 
                $source .="</li>";
            }                           
        }
            
        $source .="</ul>";
        return $source;
    }    

    /* Pages */
    public function pages($slug)
    {
        $page = Page::findBySlug($slug);

        if($page == null || $page->published == 0) {
            abort(404);
        }

        switch($slug) 
        {
            case('gioi-thieu'):
                $current = 'cur_intro';
            break;

            default: 
                $current = 'cur_intro';
                
        }
        //dd($data);
        $SEOData = new SEOData(title: $page->title, description: 'Dòng họ Nguyễn Khoa');
        return view('frontend.page', compact('page', 'current', 'SEOData'));    
    }

    public function article($slug)
    {  
        $recents = BaiViet::latest()->published()->take(5)->get();       
        $categories = Category::withCount('baiviet')->get();
        $tags = Tag::all();
        
        switch($slug) 
        {
            case('danh-nhan'):
                $current = 'cur_celeb';
                $category = Category::find(3)->name;
                $SEOData = new SEOData(title: $category, description: 'Danh nhân của dòng họ Nguyễn Khoa');
                $page = Category::find(3)->baiviet()->published()->orderBy('created_at', 'desc')->paginate(5);
            break;
            
            case('nguon-goc'):
                $current = 'cur_source';
                $category = Category::find(2)->name;
                $SEOData = new SEOData(title: $category, description: 'Nguồn gốc của dòng họ Nguyễn Khoa');
                $page = Category::find(2)->baiviet()->published()->orderBy('created_at', 'desc')->paginate(5);
            break;

            case('thong-tin'):
                $current = 'cur_info';
                $category = Category::find(1)->name;
                $SEOData = new SEOData(title: $category, description: 'Thông tin và hoạt động của dòng họ Nguyễn Khoa');
                $page = Category::find(1)->baiviet()->published()->orderBy('created_at', 'desc')->paginate(5);
            break;

            default:
                $data = BaiViet::where('slug', $slug)->first();
                switch($data->category->route) 
                {
                    case('danh-nhan'):
                        $current = 'cur_celeb';
                    break;
                    
                    case('nguon-goc'):
                        $current = 'cur_source';
                    break;

                    case('thong-tin'):
                        $current = 'cur_info';
                    break;
                }

                $next = BaiViet::where('category_id', $data->category_id)->where('created_at', '>', $data->created_at)->published()->orderBy('created_at')->first();
                $previous = BaiViet::where('category_id', $data->category_id)->where('created_at', '<', $data->created_at)->published()->orderBy('created_at', 'desc')->first();

                return view('frontend.article', compact('data', 'next', 'previous', 'recents', 'categories', 'current', 'tags'));    
        }

        return view('frontend.articles', compact('page', 'recents', 'categories', 'category', 'current', 'SEOData', 'tags'));
        
    }

    public function article_tag($slug)
    {
        $current = 'cur_article';
        if(Tag::findFromString($slug) == null ) { abort(404); }
        $category = Tag::findFromString($slug)->name;
        $page = BaiViet::withAllTags($category)->published()->orderBy('date', 'desc')->paginate(5)->withQueryString();
        $recents = BaiViet::latest()->published()->take(5)->get();       
        $categories = Category::withCount('baiviet')->get();
        $tags = Tag::all();
        $SEOData = new SEOData(title: 'Tag - '. $category, description: 'Thông tin và hoạt động của dòng họ Nguyễn Khoa');
        
        return view('frontend.articles', compact('page', 'recents', 'tags', 'categories', 'current', 'category', 'SEOData'));    
    }

    public function album()
    {
        $current = 'cur_gallery';
        $albums = DB::table('ngkhoa_albums')->simplePaginate(9);
        $recents = BaiViet::orderBy('created_at','desc')->take(5)->get();
        $categories = Category::withCount('baiviet')->get();
        $tags = Tag::all();
        $SEOData = new SEOData(title: trans('common.gallery'), description: 'Thông tin và hoạt động của dòng họ Nguyễn Khoa');

        return view('frontend.album', compact('SEOData', 'current', 'albums', 'recents', 'categories', 'tags'));    
    }

   
    public function image($id)
    {
        $current = 'cur_gallery';
        $album = DB::table('ngkhoa_albums')->where('id', $id)->first();
        $folder = public_path('uploads/albums/'.$album->folder);
        $images = File::allFiles($folder);
        $SEOData = new SEOData(title: $album->name, description: 'Thông tin và hoạt động của dòng họ Nguyễn Khoa');
        
        return view('frontend.picture', compact('current', 'images', 'album', 'images', 'SEOData'));    
    }

    public function file1()
    {
        $pageTitle = 'Liên hệ';
        // To get all files from public folder using scandir() method
        $path = public_path('uploads');
        $files = scandir($path);
    }


}