<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;  
use Illuminate\Support\Facades\Auth; 
use Validator;

use App\User;

class UserController extends Controller
{
	public function getUsers(){
		if (Auth::user()->role()->pluck('id')->first() == 1 || Auth::user()->role()->pluck('id')->first() == 2) {
			$users = User::where('id', '!=', Auth::id())->with('role')->paginate(10);
			$result['success']=true;
			$result['data']=$users;
			return response()->json($result);
		}
		else{
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		
	}

	public function getUsersDelete($id){
		$user=User::where('id', $id)->delete();
		$result['success']=true;
		$result['message']='User deleted successfully';
		return response()->json($result);
	}

	public function postUserCreate(Request $request,User $user){
		$validator = Validator::make($request->all(), [ 
			'name' => 'required', 
			'email' => 'required|email', 
			'password' => 'required',  
		]);

		if ($validator->fails()) { 
			$result['success'] = false;
			$result['message'] = 'Invalid inputs';
			$result['error'] = $validator->errors();		
			return response()->json($result);
		}		

		$user = new User;
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$user->password = bcrypt($request->get('password'));
		$user->role_id = $request->get('role_id');		
		$save = $user->save();
		if ($save) {
			$result['success']=true;
			$result['message']='User created successfully';
			return response()->json($result);
		}
		$result['success']=false;
		$result['message']='User can not be created';
		return response()->json($result);
	}
}
