<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function users(){
        $users = User::paginate(9);
        return view('admin.admin-users')->with("users",$users);
    }
    public function create(User $user){
        return view('admin.admin-users-create-form');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $data['name'] =$request->name;
        $data['email'] =$request->email;
        $data['role'] =$request->role;
        $data['password'] =$request->password;
        $user = User::create($data);
        if (!$user) {
            return redirect(route('admin.users.create.form'))->with("error","Sign up detailed is not valid");
        }
        return redirect(route('admin.users.table'))->with("sucMsg","Register successfully");
    }public function edit(User $user){
        return view('admin.admin-users-form')->with("user",$user);
    }
    public function update(User $user,Request $request){
        try {
        $input = $request->all();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->role = $input['role'];
        $user->password = $input['password'];
        $user->save();
        return redirect(route('admin.users.table'))->with('sucMsg','User is updated .');
        } catch (\Exception $e){
            return redirect(route('admin.users.edit.form',$user->id))->with('error',"This email is already exist");
        }
    }
    public function delete(User $user){
        User::where('id',$user->id)->delete();
        return redirect(route('admin.users.table'))->with('sucMsg','User is deleted .');
    }
}
