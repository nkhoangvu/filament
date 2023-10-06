<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\BaiVietRequest;
use App\Http\Requests\ImageRequest;
use Spatie\Tags\Tag;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Notification;
use App\Notifications\BaiVietCreate;
use Illuminate\Support\Facades\Route;
use DateTime;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        if($user->hasRole('super-admin')) {
            $data = BaiViet::orderBy('created_at', 'desc')->get();
        }
        else {
            $data = BaiViet::where('ngkhoa_baiviet.user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->leftJoin('categories', 'ngkhoa_baiviet.category_id', '=', 'categories.id')
                ->select('ngkhoa_baiviet.*', 'categories.name as category')->get();
        }

        return view('/backend/baiviet/index', compact('data'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $authors = User::all();
        $tags = Tag::all();

        return view('/backend/baiviet/create', compact('categories', 'authors', 'tags'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BaiVietRequest $request)
    {
        $user = auth()->user();
		$routeName = Route::currentRouteName();
		
		if($user == null) {
			abort(403);
		}
		else {
			$input = $request->validated(); 
			$published = $request->boolean('published');
			
			if($published == 1) {
				$input['published'] = 1;
			}
			else {
				$input['published'] = 0;
			}
			
			$date = DateTime::createFromFormat('d/m/Y', $request->created_at)->format('Y-m-d');
			$input['created_at'] = $date;
			if ($request->picture != null) {
				$path = $request->file('picture')->store('images');        
				$input['picture'] = $path;
			   }

			$input['user_id'] = $user->id;
			
			$data =  BaiViet::create($input);        
            
            /* Notification */
			$baiviet_id = $data->id;
			$users = User::whereRoleIs('super-admin')->get();
			Notification::send($users, new BaiVietCreate($baiviet_id));
            
            $tagNames = $request->input('tags');
            $tags = collect($tagNames)->map(function ($tagName) {
                return Tag::findOrCreate($tagName);
            });
            
            $data->seo->update([
                'title' => $request->seo_title,
                'description' => $request->seo_description,
                'author' => auth()->user()->name,
            ]);

			if($routeName == 'baiviet.update') {
				return redirect()->route('baiviet.index')->with('success',  ' [' . $data->title . '] '. trans('common.create_success'));	
			}
			else {
				return redirect()->route('baiviet.index')->with('success',  ' [' . $data->title . '] '. trans('common.create_success'));	
			}
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BaiViet::find($id);
        $categories = Category::all();
        $authors = User::all();
        $tags = Tag::all();
        
        return view('backend.baiviet.edit', compact('data', 'categories', "authors", 'tags'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BaiVietRequest $request, $id)
    {
        $data = BaiViet::find($id);
        $user = auth()->user();
        if($user->hasRole('super-admin') || $user->owns($data)) {
            $input = $request->validated(); 
            $published = $request->boolean('published');
            
            if($published == 1) {
                $input['published'] = 1;
            }
            else {
                $input['published'] = 0;
            }
            $date = DateTime::createFromFormat('d/m/Y', $request->created_at)->format('Y-m-d');
            $input['created_at'] = $date;
            if ($request->picture != null) {
                if ($data->picture != null) {
                    $old_file = storage_path().'/app/'.$data->picture;
                    if (File::exists($old_file)) {
                        File::delete($old_file);
                    }
                }
                $path = $request->file('picture')->store('images');        
                $input['picture'] = $path;
            }
            
            $data->update($input);   

            $tagNames = $request->input('tags');
            $tags = collect($tagNames)->map(function ($tagName) {
                return Tag::findOrCreate($tagName);
            });
            $data->syncTags($tags);
            
            $data->seo->update([
                'title' => $request->seo_title,
                'description' => $request->seo_description,
            ]);

            return redirect()->route('baiviet.index')->with('success',  ' [' . $data->title . '] '. trans('common.update_success'));
        }
        else {
            return redirect()->route('baiviet.index')->with('failed',  ' [' . $data->title . '] '. trans('common.no_permision'));
        }
        
    }

    public function destroy($id)
    {
        $data = BaiViet::find($id);
        $user = auth()->user();
        if($user->hasRole('super-admin') && $user->owns($data)) {
            
            $title = $data->title;
            $data->delete();

            return redirect()->route('baiviet.index')->with('success',  ' [' . $title . '] '. trans('common.delete_success'));	
        }
        else {
            return redirect()->route('baiviet.index')->with('failed',  trans('common.no_permission'));	
        }
    }

    public function addImage(ImageRequest $request, $id)
    {
        $input = $request->validated(); 
        $file = $request->file('filename');
        $title = $request->image_title;
        $data = BaiViet::find($id);
        
        if ($request->filename != null) {
            $name = rand(10000000, 99999999).'.'.$file->extension();  
            $data
                ->addMediaFromRequest('filename')
                ->usingFileName($name)
                ->withCustomProperties(['title' => $title])
                ->toMediaCollection('article');
        }
        
        return redirect()->route('baiviet.edit', [$id]);
    }

    public function deleteImage($post_id, $id)
    {
        $data = BaiViet::find($post_id);       
        $data->deleteMedia($id);
        
        return redirect()->route('baiviet.edit', [$post_id]);
    }
}
