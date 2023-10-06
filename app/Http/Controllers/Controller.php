<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nguoi;
use App\Models\Ngoai;
use App\Models\DauRe;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;
use App;

use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->route('/');
    }
   
    public function index()
    {
        $user = auth()->user();

        $locale = 'vi';
        if($user->hasRole('super-admin|admin')) {

            $nguoi = Nguoi::all()->count();
            $ngoai = Ngoai::all()->count();
            $daure = DauRe::all()->count();
            $total = $nguoi + $daure + $ngoai;
            $latest = Nguoi::select('MaDoi')->max('MaDoi');

            $data = Nguoi::select('ngkhoa_nguoi.*')->orderBy('MaNguoi', 'desc')->take(5)->get();
			//SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));

            return view('/backend/index', compact('total', 'nguoi', 'latest', 'data')); 
        }
        else {
            return redirect()->route('home')->with('error','Bạn chưa có quyền truy cập nội dung này. Vui lòng liên hệ quản trị viên.');
        }
    }

    public function maintenance ()
    {
        $user = auth()->user();
        
        if(!app()->isDownForMaintenance()) {
            $secret = Str::random(24);
            $url = route('home') . '/' . $secret;
            $exitCode = Artisan::call('down', [
                '--render' => 'maintenance',
                '--secret' => $secret,
            ]);
            return redirect($url)->with('success',  trans('common.down_success') . $url);
        }
        else {
            Artisan::call('up');
            return redirect()->route('dashboard')->with('success',  trans('common.live_success'));	
        }
    }

}

