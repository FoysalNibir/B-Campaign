<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Redirect;
use View;
use App\User;
use App\Role;

class AdminController extends Controller
{	
	public function getUsers(){
		$users = User::where('id', '!=', Auth::id())->with('role')->paginate(10);
		return View::make('admin.users',compact('users'));
	}

	public function getUsersDelete($id){
		$user=User::where('id', $id)->delete();
		return Redirect()->back()->with('status','User deleted successfully');
	}

	public function getUserCreate(){
		$roles = Role::get();
		return View::make('admin.usercreate',compact('roles'));
	}

	public function postUserCreate(Request $request,User $user){
		$validator = Validator::make($request->all(), [ 
			'name' => 'required', 
			'email' => 'required|email', 
			'password' => 'required',  
		]);


		if ($validator->fails()) { 
			return Redirect::back()->withErrors($validator)->withInput();
		}	

		$avatar = $request->file('avatar');

		$destinationPath =public_path() . "\\storage\\photos\\users\\" ;
      	$avatar->move($destinationPath,$avatar->getClientOriginalName());

		$user = new User;
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$user->password = bcrypt($request->get('password'));
		$user->role_id = $request->get('role');
		$user->avatar = "storage\\photos\\users\\" . $avatar->getClientOriginalName();
		$save = $user->save();
		if ($save) {
			return Redirect::back()->with('status','User created successfully');
		}
		return Redirect::back()->with('error','User can not be created');
	}
}
