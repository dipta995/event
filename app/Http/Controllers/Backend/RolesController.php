<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function($request,$next){
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('role.view')) {
            abort(403,'Unauthorized Access');
        }
        $roles = Role::all();
        return view('backend.pages.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('role.create')) {
            abort(403,'Unauthorized Access');
        }
        $permission_groups=User::getpermissionGroup();

        $permissions = Permission::all();
        return view('backend.pages.roles.create',compact('permissions','permission_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('role.create')) {
            abort(403,'Unauthorized Access');
        }
        $request->validate([
            'name'=> 'required|max:100|unique:roles'
        ],[
            'name.required' => 'Please Insert New Role Name'
        ]);
        $role = Role::create(['name' => $request->name]);
        $permissions = $request->permissions;
        if ($role) {
            if (!empty($permissions)) {
                $role->syncPermissions($permissions);
            }
            return back()->with('success','New Role Created');
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
        if (is_null($this->user) || !$this->user->can('role.edit')) {
            abort(403,'Unauthorized Access');
        }
        $role = Role::findById($id);
        $permission_groups=User::getpermissionGroup();
        $permissions = Permission::all();
        return view('backend.pages.roles.edit',compact('role','permissions','permission_groups'));
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
        if (is_null($this->user) || !$this->user->can('role.edit')) {
            abort(403,'Unauthorized Access');
        }
        $request->validate([
            'name'=> 'required|max:100'
        ],[
            'name.required' => 'Please Insert New Role Name'
        ]);
        // $role = Role::create(['name' => $request->name]);
        $role = Role::findById($id);
        $permissions = $request->permissions;
        if ($role) {
            if (!empty($permissions)) {
                $role->name = $request->name;
                $role->save();
                $role->syncPermissions($permissions);
            }
            return back()->with('success','New Role Created');
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
        if (is_null($this->user) || !$this->user->can('role.delete')) {
            abort(403,'Unauthorized Access');
        }
        $role = Role::findById($id);
        if (!is_null($role)) {
            $role->delete();
        }
        session()->flash('success','user has been deleted');
        return back();

    }
}

