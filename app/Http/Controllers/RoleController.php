<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::all();
        
        return view('/backend/role/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/backend/role/create');
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
            'name' => 'required|alpha-dash|unique:roles,name',
            'display_name' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $data = Role::create($input);
        $data->syncPermissions($request->get('permissions') ?? []);

        return redirect()->route('role.index')->with('success', trans('common.role') . ' [' .$data->name .'] '. trans('common.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Role::findOrFail($id);

        return view('/backend/role/edit', compact('data'));
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
        $data = Role::findOrFail($id);

        $input = $this->validate($request, [
            'display_name' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $data->update($input);
        //$data->syncPermissions($request->get('permissions') ?? []);

        return redirect()->route('role.index')->with('success', trans('common.role') . ' [' .$data->name .'] '. trans('common.update_success'));
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

    public function permissionassign($id)
    {
        $user = auth()->user();
        
        if($user->hasRole('super-admin')) {
            $data =  DB::table('roles')->where('roles.id', '=', $id)
            ->select('roles.*')->first();

            $permissionlist =  Permission::all();    

            $permissionassigned =  DB::table('permission_role')->where('role_id', '=', $id)
            ->leftJoin('permissions', 'permission_role.permission_id', '=', 'permissions.id')
            ->orderBy('permissions.name')
                ->select('permission_role.*','permissions.name as name', 'permissions.display_name as displayname', 'permissions.description as description' )->get();
        
            $ids = $permissionassigned->pluck('permission_id')->all();

            $permission = $permissionlist->except($ids);

            return view('/backend/role/permission', compact('data', 'permissionassigned', 'permission'));
        }
        
        return view('errors.403');
    }

    public function permissionAdd($id, Request $request)
    {
        $role = Role::find($id);        
        $permission = $request->permission;
        
        $role->attachPermission($permission);
        
        return redirect()->route('role.permission', [$id])->with('success', trans('common.assign_success'));	     
      //  return view('/admin/role/permission', compact('data', 'permissionassigned', 'permission'));
    }
    
    public function permissionRemove($id, $permission_id)
    {
        $role = Role::find($id); 

        $role->detachPermission($permission_id);
        
        return redirect()->route('role.permission', [$id])->with('success', trans('common.unassign_success'));	     
    }
}
