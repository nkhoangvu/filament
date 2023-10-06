<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laratrust\Helper;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;


class AssignController extends Controller
{
  
    public function permissionlist($id)
    {
        $data =  Computer::where('computers.id', '=', $id)
        ->leftJoin('models', 'computers.model', '=', 'models.id')
        ->leftJoin('brands', 'models.brand', '=', 'brands.id') 
        ->leftJoin('types', 'models.type', '=', 'types.id')
        ->leftJoin('users', 'computers.user', '=', 'users.id')
        ->leftJoin('departments', 'users.department', '=', 'departments.id')
            ->select('computers.*', 'brands.name as brand', 'types.name as type', 'models.name as model', 'users.name as user', 'departments.name as department')->first();
    
        $softadded =  CompSoft::where('computer', '=', $id)
        ->leftJoin('software', 'computer_soft.soft', '=', 'software.id')
        ->leftJoin('brands', 'software.brand', '=', 'brands.id')
        ->orderBy('brands.name')        
            ->select('computer_soft.*','brands.name as brand', 'software.name as name', 'software.edition as edition', 'software.license as license')->get();
        
        $softlist =  Software::where('software.is_deleted', '!=', 1)
        ->leftJoin('brands', 'software.brand', '=', 'brands.id')
        ->orderBy('brands.name')
                ->select('software.*','brands.name as brand', 'software.name as name', 'software.license as license')->get();
        
        $ids = $softadded->pluck('soft')->all();

        $soft = $softlist->except($ids);
        
        //dd($soft);     

        return view('/computer/softedit', compact('data', 'softadded', 'softlist', 'soft'));
    }

    /**
     * Remove the specified software from computer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    
    public function permission_delete($id, Request $request)
    {
        $role = CompSoft::find($id); 
        $computer  = $soft->computer;
        $soft->delete();

        return redirect()->route('computer.softedit', ['id'=>$computer]);
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   

     public function permission_add($id, Request $request)
    {
        $computer = $id;
        $soft = $request->soft;

   		$data = new CompSoft();
        $data->computer = $computer;
        $data->soft = $soft;
      	$data->save();
    	
        return redirect()->route('computer.softedit', [$computer]);
    }

}