<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->can('read-roles')) {

            $roles = \App\Models\Role::with('permissions')->get();

            return view('role.index', compact('roles'));
        }

        return redirect('auth/logout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::user()->can('create-roles')) {

        $permissions = \App\Models\Permission::lists('display_name', 'id');
        
        return view('role.create', compact('permissions'));
        }

        return redirect('auth/logout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\Auth::user()->can('create-roles')) {

            $this->validate($request, [
                'name' => 'required|min:3|unique:roles,name',
                'display_name' => 'required|min:3',
                'description' => 'required|min:3',                
                'permission_id' =>'required'
            ]);

            $data = \App\Models\Role::create($request->all());

            $role = \App\Models\Role::findOrFail($data->id);

            $data->attachPermissions($request->input('permission_id'));

            \Session::flash('message', trans('ui.role.message_create', array('name' => $role->name)));

            return redirect('auth/role/create');
        }

        return redirect('auth/logout');
    }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(\Auth::user()->can('update-roles')) {

        $role = \App\Models\Role::findOrFail($id);

        $permission_role = \App\Models\Role::find($id)->permissions()->lists('permission_id')->toArray();

        $permissions = \App\Models\Permission::lists('display_name', 'id')->toArray();

        asort($permissions);

        return view('role.edit', compact('role', 'permissions', 'permission_role'));
        }

        return redirect('auth/logout');
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
      if(\Auth::user()->can('update-roles')) {

            $role = \App\Models\Role::findOrFail($id);

            $role->update($request->all());

            if($role->permissions->count()) {

               $role->permissions()->detach($role->permissions()->lists('permission_id')->toArray());
            }

            $role->attachPermissions($request->input('permission_id'));

            \Session::flash('message', trans('ui.role.message_update', array('name' => $role->name)));

            return redirect('auth/role');
        }

             return redirect('auth/logout');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if(\Auth::user()->can('delete-roles')) {

            $role = \App\Models\Role::findOrFail($id);

            \App\Models\Role::destroy($id);

            \Session::flash('message', trans('ui.role.message_delete', array('name' => $role->display_name)));

            return redirect('auth/role');
        }

        return redirect('auth/logout');
    }


}
