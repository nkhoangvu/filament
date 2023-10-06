<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Permission::all();
        
        return view('/backend/permission/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/backend/permission/create');
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
            'name' => 'required|alpha-dash|unique:permissions,name',
            'display_name' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $data = Permission::create($input);

        return redirect()->route('permission.index')->with('success', trans('common.permission') .' ['.$data->name.'] '. trans('common.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Permission::findOrFail($id);

        return view('/backend/permission/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Permission::findOrFail($id);

        $input = $this->validate($request, [
            'display_name' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $data->update($input);

        return redirect()->route('permission.index')->with('success', trans('common.permission') .' ['.$data->name.'] '. trans('common.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
