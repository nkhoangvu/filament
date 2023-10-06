<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Nguoi;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Group;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('users.is_deleted', 0)
        ->leftJoin('groups', 'users.group_id', '=', 'groups.id')
        ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
        ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
        ->select('users.*', 'groups.name as group', 'roles.display_name as role')->get();

        return view('/backend/user/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group = Group::where('is_deleted',0)->get();

        $role = Role::all();

        return view('/backend/user/create', compact('group', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->validated(); 
        
        $input['password'] = Hash::make($input['password']);
        
        $data = User::create($input);

        $role = $request->input('role');
        
        $data->attachRole($role);    
         	
        return redirect()->route('user.index')->with('success', $data->name .' '. trans('common.create_success'));
    		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
    	$group = Group::where('is_deleted',0)->get();
        $role = Role::all();

        $roleid = DB::table('role_user')->where('user_id', $id)
        ->select('role_user.role_id')->first();
        
        if ($roleid == null) {
            $roleid = 0;
        }
        else {
            $roleid = $roleid->role_id;
        }
        
        return view('/backend/user/edit', compact('data','group','role','roleid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UserRequest $request)
    {
        $data = User::find($id);

        $password = $request->password;
        $input = $request->validated();
        if(!empty($password)) {
            $input['password'] = Hash::make($input['password']);
        }
        
        $data->update($input);
        
        $role = Role::find($request->input('role'));
        $rolecheck = DB::table('role_user')->where('user_id', $id)
            ->select('role_user.role_id')->first();
       
        if($role != null) {
            if($rolecheck != null) {
                $data->detachRole($rolecheck->role_id);
                $data->attachRole($role->id);    
            }
            else {
                $data->attachRole($role->id);    
            }
        }
        else {
            if($rolecheck != null) {
                $data->detachRole($rolecheck->role_id);
            }
        }

        if(isset($request->nguoiList)) {
            $nguoi = Nguoi::find($request->input('nguoiList'));
            $nguoi->user_id = $id;
            $nguoi->save();
        }

        return redirect()->route('user.index')->with('success', trans('common.user') .' ['.$data->name .'] '. trans('common.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = User::find($id);
        
        $data->is_deleted = 1;
        $data->save();
        
        return redirect()->route('user')->with('success', $data->name .' '. trans('common.delete_success'));
    }

    public function profile()
    {
        $user = auth()->user();
        $data = DB::table('users')->where('users.id', $user->id)
        ->leftJoin('groups', 'users.group_id', '=', 'groups.id')
            ->select('users.*', 'groups.name as group', 'groups.description as description')->first();
        
        $permission = Auth::user()->allPermissions();
        
        if(Route::is('frontend.profile')) {
            return view('/frontend/profile', compact('data', 'permission'));
            
        }
        else {
            return view('/auth/profile', compact('data', 'permission'));
        }
    }
    
    public function privilege($id)
    {
        $data = User::find($id);
        
        $permission = Auth::user()->allPermissions();
        
        return view('/auth/privilege', compact('data', 'permission'));
    }

    public function password($id, Request $request)
    {
        $data = User::find($id);

        return view('/backend/user/setpass', compact('data'));
    }

    public function setpass($id, Request $request)
    {
        $data = User::find($id);
        $password = $request->get('password');

        if(!empty($password)) {
            
            $input = $this->validate($request, [
                'password' => 'required|min:6',
                'confirm' => 'required|same:password',
            ]);
            
            $input['password'] = Hash::make($input['password']);
            $data->update($input); 
            $id = $data->id;
            
            return redirect()->route('profile', [$id])->with('success', trans('common.password') .' '. trans('common.update_success'));
        }
        else {
            
            $id = $data->id;
            return redirect()->route('profile', [$id])->with('failed', trans('common.password') .' '. trans('common.no_pass'));

        }
    }

}
