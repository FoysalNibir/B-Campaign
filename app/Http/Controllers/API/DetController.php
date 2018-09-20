<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;  
use Illuminate\Support\Facades\Auth; 
use Validator;

use App\Det;

class DetController extends Controller
{	
	public function getDets(){
		if ($this->checkRole == 1 || $this->checkRole == 2 || $this->checkRole == 5) {
			$dets = Det::with('user')->get();
			$result['success']=true;
			$result['data']=$dets;
			return response()->json($result);
		}
		elseif ($this->checkRole == 4) {
			$dets = Det::where('user_id', Auth::id())->with('user')->get();
			$result['success']=true;
			$result['data']=$dets;
			return response()->json($result);
		}
		else{
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
	}

	public function getDet($id){		
		if ($this->checkRole == 1 || $this->checkRole == 2 || $this->checkRole == 5) {
			$det = Det::where('id', $id)->with('constituencies')->first();
			$result['success']=true;
			$result['data']=$det;
			return response()->json($result);
		}
		elseif ($this->checkRole == 4) {
			$det = Det::where('id', $id)->where('user_id', Auth::id())->with('constituencies')->first();
			$result['success']=true;
			$result['data']=$det;
			return response()->json($result);
		}
		else{
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
	}

	public function getDetDelete($id){
		if ($this->checkRole != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		$det=Det::where('id', $id)->delete();
		$result['success']=true;
		$result['message']='DET deleted successfully';
	}

	public function postDetCreate(Request $request,Det $det){
		if ($this->checkRole != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}

		$validator = Validator::make($request->all(), [ 
			'name' => 'required' 
		]);

		if ($validator->fails()) { 
			$result['success'] = false;
			$result['message'] = 'Invalid inputs';
			$result['error'] = $validator->errors();		
			return response()->json($result);
		}

		$det = new Det;
		$det->name = $request->get('name');
		$det->remark = $request->get('remark');
		$det->user_id = $request->get('user_id')
		$save = $det->save();

		if ($save) {
			$result['success'] = true;
			$result['message'] = 'DET created successfully';	
			return response()->json($result);
		}
		$result['success'] = false;
		$result['message'] = 'DET could not be created';	
		return response()->json($result);
	}

	public function postDetsEdit(Request $request, $id){
		if ($this->checkRole() != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		$det = Det::where('id', $id)->first();
		$det->name = $request->get('name', $det->name);
		$det->remark = $request->get('remark', $det->remark);
		$update = $det->update();
		
		if ($update) {
			$result['success'] = true;
			$result['message'] = 'DET updated successfully';	
			return response()->json($result);
		}
		$result['success'] = false;
		$result['message'] = 'DET could not be updated';	
		return response()->json($result);
	}
}
