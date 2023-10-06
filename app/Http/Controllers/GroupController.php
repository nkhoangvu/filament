<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Group::where('is_deleted', 0)->get();
        
        return view('/backend/group/index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
       
    	$data = Group::create($input);
        
        return redirect()->route('group.index')->with('success', $data->name .' - '. trans('common.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Group::findOrFail($id);
           
        return view('/backend/group/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data = Group::find($id);

        $input = $this->validate($request, [
            'name' => 'required|string',
            'location' => 'required|string',
        ]);
    	
        $data->update($input);

        return redirect()->route('group.index')->with('success', $data->name .' - '. trans('common.update_success'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $data = Group::find($id);

        $data->delete();

        return redirect()->route('group.index');
    }

    public function delete($id)
    {
        $data = Department::find($id);
        
        $data->is_deleted = 1;
        $data->save();
        
        return redirect()->route('department.index')->with('success', $data->name .' - '. trans('common.delete_success'));
    }
}
