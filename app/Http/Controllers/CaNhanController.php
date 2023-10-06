<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Models\User;
use App\Models\Nguoi;
use Illuminate\Support\Facades\Route;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use DateTime;



class CaNhanController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $data = User::find($user->id);
        
        $pageTitle = 'Trang gia đình';
        $pageDescription = 'Trang Thông tin và Gia phả';
		
        $SEOData = new SEOData(title: $pageTitle, description: $pageDescription);
        
        return view('/frontend/canhan/profile', compact('data', 'SEOData') );    
    
    }

    
}
