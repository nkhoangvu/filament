<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use App\Models\Page;
use App\Models\Nguoi;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public function index()
    {
        $baiviet = BaiViet::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        $trang = Page::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        $nguoi = Nguoi::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        //dd($page);
        return view('backend.trash.index', compact('baiviet', 'trang', 'nguoi'));       
    }

    public function restore($model, $id)
    {
        switch($model) {
            case('page'):

                $trash = Page::withTrashed()->find($id);
            break;

            case('baiviet'):

                $trash = BaiViet::withTrashed()->find($id);
            break;

            case('nguoi'):

                $trash = Nguoi::withTrashed()->find($id);
            break;
        }
        
        $trash->restore();

        return redirect()->route('trash.index')->with('success', ' [' . $trash->title .'] '. trans('common.restore_success'));   
    }

    public function destroy($model, $id)
    {
        switch($model) {
            case('page'):

                $trash = Page::withTrashed()->find($id);
            break;

            case('baiviet'):

                $trash = BaiViet::withTrashed()->find($id);
            break;

            case('nguoi'):

                $trash = Nguoi::withTrashed()->find($id);
            break;
        }
        
        $trash->forceDelete();

        return redirect()->route('trash.index')->with('success', ' [' . $trash->title .'] '. trans('common.restore_success'));   
    }

    public function purge($model)
    {
        switch($model) {
            case('page'):

                $trash = Page::onlyTrashed()->get();
            break;

            case('baiviet'):

                $trash = Post::onlyTrashed()->get();
            break;

            case('nguoi'):

                $trash = Post::onlyTrashed()->get();
            break;

        }
        
        foreach ($trash as $item) {
            $item->forceDelete();
        }

        return redirect()->route('trash.index')->with('success', 'Model - [' . ucfirst($model) .'] '. trans('common.purge_success'));   
    }
}

