<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Zizaco\Entrust\EntrustRole;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $users = User::all();
        return view('admin.users',['users' => $users]);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.create-user',['roles' => $roles]);
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required|min:5',
            'roles' => 'required',
            'is_active' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->except('password'));
        }
        /* Create a new user */

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->is_active = $request->get('is_active');
        $user->save();

        /* Attach new roles to user */
        foreach($request->get('roles') as $role ){
            $user->attachRole($role);
        }
        if($user->id){
            return redirect(route('admin:users'))->with('message', 'Successfully created the User.');
        }
        else{
            return redirect(route('admin:users'))->with('message', 'Error while creating a new user.');
        }
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::find($id);
        return view('admin.edit-user',['user' => $user , 'roles' => $roles]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,'.$id,
            'roles' => 'required',
            'is_active' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        /* Update User */
        $user = User::where('id',$id)->first();
        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'is_active' => $request->get('is_active'),
        ]);

        /* Delete all previous roles  */
        DB::table('role_user')->where('user_id',$id)->delete();

        /* Attach new roles to user */
        foreach($request->get('roles') as $role ){
            $user->attachRole($role);
        }

        return redirect()->back()->with('message', 'Successfully updated the User.');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->back()->with('message', 'Successfully deleted the User.');
    }

    /**
     * Show the form for updating user password.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword(){
        $users = User::all();
        return view('admin.change-password',['users' => $users]);
    }

    /**
     * Update the password for a user .
     *
     * @return json message
     */
    public function updatePassword(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:5'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error','message' => $validator->errors()]);
        }
        $user = User::where('id',$id)->first();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return response()->json(['status' => 'success','message' => 'Successfully updated the password for user '.$user->name]);
    }
}
