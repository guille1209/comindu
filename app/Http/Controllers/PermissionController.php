<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(\Auth::user()->can('read-permissions')) {

            $permissions = \App\Models\Permission::all();

            return view('permission.index', compact('permissions'));
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
        if(\Auth::user()->can('create-permissions')) {

        return view('permission.create');
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
         if(\Auth::user()->can('create-permissions')) {

            $this->validate($request, [
                'name' => 'required|min:3|unique:permissions,name',
                'display_name' => 'required|min:3',
                'description' => 'required|min:3'        
            ]);

            $data = \App\Models\Permission::create($request->all());

            $permission = \App\Models\Permission::findOrFail($data->id);

           \Session::flash('message', trans('ui.permission.message_create', array('name' => $permission->name)));

            return redirect('auth/permission/create');

        }

        return redirect('auth/logout');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       if(\Auth::user()->can('update-permissions')) {

        $permission = Permission::findOrFail($id);

        return view('permission.edit', compact('permission'));

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
        if(\Auth::user()->can('update-permissions')) {

        $permission = \App\Models\Permission::findOrFail($id);

        return view('permission.edit', compact('permission'));

        }

        return redirect('auth/logout');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
    
    public function update(Request $request, $id)
    {
        //
    } */

     public function update($id, Request $request) {

        if(\Auth::user()->can('update-permissions')) {

        $permission = \App\Models\Permission::findOrFail($id);

        $permission->update($request->all());

        \Session::flash('message', trans('ui.permission.message_update', array('name' => $permission->name)));

        return redirect('auth/permission');

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
         if(\Auth::user()->can('delete-permissions')) {
        
            $permission = \App\Models\Permission::findOrFail($id);

            \App\Models\Permission::destroy($id);

            \Session::flash('message', trans('ui.permission.message_delete', array('name' => $permission->name)));

            return redirect('auth/permission');

        }

        return redirect('auth/logout');
    }
}
