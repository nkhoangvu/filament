<?php

namespace App\Http\Controllers;

use ProtoneMedia\LaravelCrossEloquentSearch\Search;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nguoi;
use App\Models\BaiViet;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Collection;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Tags\Tag;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $input = $request->input('search');
        $routeName = Route::currentRouteName();
		
        $pageTitle = "Kết quả tìm kiếm";
        $current = 'cur_no';
        $recent = BaiViet::orderBy('created_at','desc')->take(5)->get();
        $category = Category::withCount('baiviet')->get();

        $replace = array("/", ";");

        if (str_contains($input, "/") || str_contains($input, ";")) {
            $search = str_replace(["/", ";"], ["-", " "], $input);

        }
        else {
            $search = $input;
        }
		
        if($search == null) {
            return back();
        }
        
		$data = Search::new()
        ->add(BaiViet::where('published', 1), ['title', 'content'])
        ->add(Nguoi::class, ['Ten'])
        ->beginWithWildcard()
            ->includeModelType()
            ->search($search);
		
        $nguoi = Search::new()
        ->add(Nguoi::class, ['Ten'])
        ->endWithWildcard()
            ->includeModelType()
            ->search($search);

        $baiviet = Search::new()
        ->add(BaiViet::where('published', 1), ['title', 'content'])
        ->beginWithWildcard()
        ->endWithWildcard()
            ->includeModelType()
            ->search($search);
        
        $data = $nguoi->concat($baiviet);
        $count = $data->count();
        
        // Set the number of items per page
        $itemsPerPage = 6;
        // Create a new LengthAwarePaginator instance
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $pagedData = $data->slice(($currentPage - 1) * $itemsPerPage, $itemsPerPage);
        $pagination = new LengthAwarePaginator($pagedData, $data->count(), $itemsPerPage, $currentPage);
        $pagination->setPath($request->path());

        $SEOData = new SEOData(title: $pageTitle, description: 'Thông tin và hoạt động của dòng họ Nguyễn Khoa');

        return view('frontend.search', compact('pagination', 'pageTitle', 'current', 'recent', 'category', 'count', 'SEOData', 'search') );
    }

    public function search_post(Request $request)
    {
        $input = $request->input('search');
        $pageTitle = "Tìm kiếm";
        $recents = BaiViet::orderBy('created_at','desc')->take(5)->get();
        $categories = Category::withCount('baiviet')->get();
		$tags = Tag::all();
		
        if (str_contains($input, "/") || str_contains($input, ";")) {
            $search = str_replace(["/", ";"], ["-"," "], $input);

        }
        else {
            $search = $input;
        }
		
        if($search == null) {
            return back();
        }

        $results = Search::new()
        ->add(BaiViet::published(), ['title', 'content'])
        ->beginWithWildcard()
        ->includeModelType()
            ->paginate(5)
            ->search($search)
            ->withQueryString();

        $count = $results->total();
        $current = 'cur_no'; 
		$SEOData = new SEOData(title: $pageTitle, description: 'Thông tin và hoạt động của dòng họ Nguyễn Khoa');
        
        return view('frontend.search_result', compact('results', 'pageTitle', 'current', 'count', 'recents', 'categories', 'tags', 'SEOData', 'search') );
    }

    public function search_nguoi(Request $request)
    {
        $input = $request->input('search');
        $pageTitle = "Tìm kiếm";

        // Search in the title and body columns from the posts table
        if (str_contains($input, "/")) {
            $search = str_replace("/", "-", $input);
        }
        else {
            $search = $input;
        }

        $data = Nguoi::query()
        ->where('Ten', 'LIKE', "%{$search}%")
        ->orWhere('TenDem', 'LIKE', "%{$search}%")
        ->orWhere('MaDoi', 'LIKE', "%{$search}%")
        ->orWhere('MaNhanh', 'LIKE', "%{$search}%")
            ->get();          
        $SEOData = new SEOData(title: $pageTitle, description: 'Thông tin và hoạt động của dòng họ Nguyễn Khoa');

        return view('frontend.list', compact('data', 'pageTitle', 'SEOData') );
    }

}
