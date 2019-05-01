<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;



class UserController extends Controller
{


    public function __construct() {

        $this->middleware('auth');
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if(\Auth::user()->can('read-users')) {

            $users = \App\Models\User::with('roles')->get();

            return view('user.index', compact('users'));
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
         if(\Auth::user()->can('create-users')) {

            $roles = \App\Models\Role::orderBy('display_name', 'asc')->lists('display_name', 'id');

            return view('user.create', compact('roles'));
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
       if(\Auth::user()->can('create-users')) {

             $this->validate($request, [
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'username' => 'required|min:3',
            'password' => 'required|confirmed|min:5',
            'password_confirmation' => 'required|min:5',
            'email' => 'email|required|unique:users,email',
            'role_id' =>'required'
        ]);

            $data = \App\Models\User::create([
                'firstname' =>  $request->input('firstname'),
                'lastname'  =>  $request->input('lastname'),
                'username'  =>  $request->input('username'),
                'email'     =>  $request->input('email'),
                'password'  =>  \Hash::make($request->input('password')),
            ]);

            $user = \App\Models\User::findOrFail($data->id);

            $data->attachRoles($request->input('role_id'));

            \Session::flash('message', trans('ui.user.message_create', array('name' => $user->firstname)));

            return redirect('auth/user');
        }

        return redirect('auth/logout');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
           return view('auth.form_change_password');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        if(\Auth::user()->can('update-users')) {

            $user = \App\Models\User::findOrFail($id);

            $roles_user = \App\Models\User::find($id)->roles()->lists('role_id')->toArray();

            $roles = \App\Models\Role::orderBy('display_name', 'asc')->lists('display_name', 'id');

            return view('user.edit', compact('user', 'roles', 'roles_user'));
        }

        return redirect('auth/logout');
    } //

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(\Auth::user()->can('update-users')) {

             $this->validate($request, [
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'username' => 'required|min:3',            
            'role_id' =>'required'
        ]);

            $data = ! $request->has('password') ? $request->except('password') : array(
                    'firstname' =>  $request->input('firstname'),
                    'lastname'  =>  $request->input('lastname'),
                    'username'  =>  $request->input('username'),
                    'email'     =>  $request->input('email'),
                    'password'  =>  \Hash::make($request->input('password')),
            );

            $user = \App\Models\User::findOrFail($id);

            $user->update($data);

            if($user->roles->count()) {

                $user->roles()->detach($user->roles()->lists('role_id')->toArray());
            }

            $user->attachRoles($request->input('role_id'));

            \Session::flash('message', trans('ui.user.message_update', array('name' => $user->firstname)));

            return redirect('auth/user');
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
       if(\Auth::user()->can('delete-users')) {

            $user = \App\Models\User::findOrFail($id);

            \App\Models\User::destroy($id);

            \Session::flash('message', trans('ui.user.message_delete', array('name' => $user->firstname)));

            return redirect('auth/user');
        }

        return redirect('auth/logout');
    }

    /*public function showChangePassword()
    {
           return view('auth.form_change_password');
    }*/

    public function changePassword(Request $request) {

        $this->validate($request, [
            'password' => 'required|confirmed|min:5',
            'password_confirmation' => 'required|min:5',
        ]);

      
        $user = \App\models\User::findOrFail( \Auth::user()->id);

        $data = array(
            'password' => \Hash::make($request->input('password'))
        );

        $user->update($data);

        \Session::flash('message', trans('ui.user.message_change_password'));

        return redirect('auth/change-password');
    }
}