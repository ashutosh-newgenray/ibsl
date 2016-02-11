<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Permission;
use App\Models\Role;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('position')->get();
        $roles = Role::all();
        return view('admin.menu-permissions',['menus' => $menus,'roles' => $roles]);
    }

    public function getRolePermissions($role){
        $menus = Menu::orderBy('position')->get();
        $roles = Role::all();
        $permissions = DB::table('permission_role')
                ->join('roles','permission_role.role_id','=','roles.id')
                ->join('permissions','permission_role.permission_id','=','permissions.id')
                ->where('roles.name',$role)
                ->lists('permissions.name');
        return view('admin.menu-permissions',['menus' => $menus,'roles' => $roles,'permissions' => $permissions, 'roleName' => $role]);
    }

    /**
     * Update the Menu related role_permission in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   string $role
     * @return \Illuminate\Http\Response
     */

    public function updateRolePermissions(Request $request,$role){

        /* Remove Old Menu Permissions  */

        $permissions = DB::table('permission_role')
            ->join('roles','permission_role.role_id','=','roles.id')
            ->join('permissions','permission_role.permission_id','=','permissions.id')
            ->where('roles.name',$role)
            ->whereIn('permissions.name',$this->getMenuPermission())
            ->delete();

        /* Get Ids of Menu Permissions from Permissions table */

        $permissionArr = $this->getMenuPermissionIds();

        /* Create Array of Selected Permission Ids */

        $newPermissionsArr = [];
        foreach($request->input('permission') as $key=>$value){
            $newPermissionsArr[] = $permissionArr[$value];
        }

        /* Find Selected Role and Attach Permissions */

        $role = Role::where('name',$role)->first();
        $role->attachPermissions($newPermissionsArr);

        return redirect()->back();
    }

    private function getMenuPermission(){
        $submenu = SubMenu::lists('name');
        $menuPermissionArr = [];
        foreach($submenu as $item){
            $menuPermissionArr[] = "$item-no-access";
            $menuPermissionArr[] = "$item-can-view";
            $menuPermissionArr[] = "$item-can-edit";
            $menuPermissionArr[] = "$item-can-create-new";
        }
        return $menuPermissionArr;
    }

    private function getMenuPermissionIds(){
        $permissions = DB::table('permissions')
            ->whereIn('permissions.name',$this->getMenuPermission())
            ->lists('permissions.id','permissions.name');
        return $permissions;
    }
}
