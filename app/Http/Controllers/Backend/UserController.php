<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.pages.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = User::all();
        return view('backend.pages.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|max:100|unique:users'
        ],[
            'name.required' => 'Please Insert New User Name'
        ]);
        $user = User::create(['name' => $request->name]);
        $permissions = $request->permissions;
        if ($user) {
            if (!empty($permissions)) {
                $user->syncPermissions($permissions);
            }
            return back()->with('success','New User Created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findById($id);
        $roles = Role::all();
        return view('backend.pages.users.edit',compact('user','roles'));
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
        $request->validate([
            'name'=> 'required|max:100'
        ],[
            'name.required' => 'Please Insert New User Name'
        ]);
        // $user = User::create(['name' => $request->name]);
        $user = User::findById($id);
        $permissions = $request->permissions;
        if ($user) {
            if (!empty($permissions)) {
                $user->name = $request->name;
                $user->save();
                $user->syncPermissions($permissions);
            }
            return back()->with('success','New User Created');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user = User::findById($id);
         if (!is_null($user)) {
             $user->delete();
         }
         session()->flash('success','user has been deleted');
         return back();

    }
}

