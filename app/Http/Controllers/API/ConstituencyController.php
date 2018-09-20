<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;  
use Illuminate\Support\Facades\Auth; 
use Validator;

use App\Det;
use App\Constituency;

class ConstituencyController extends Controller
{
	public function getDetNames(){
		if ($this->checkRole != 1 || $this->checkRole != 2 || $this->checkRole != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		$detNames = Det::select('id','name')->get();
		$result['success']=true;
		$result['data']=$detNames;
		return response()->json($result);
	}

	public function getConstituencies(){
		if ($this->checkRole == 4) {
			$images = Constituency::whereHas('det', 
							function($query) {
								$query->where('user_id', Auth::id());
							})->paginate(10);
			$result['success']=true;
			$result['data']=$images;
			return response()->json($result);
		}
		elseif ($this->checkRole != 1 || $this->checkRole != 2 || $this->checkRole != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		$constituencies = Constituency::get();
		$result['success']=true;
		$result['data']=$constituencies;
		return response()->json($result);
	}

	public function getConstituency($id){
		if ($this->checkRole == 4) {
			$images = Constituency::where('id', $id)->whereHas('det', 
							function($query) {
								$query->where('user_id', Auth::id());
							})->with('det')->with('threats')->with('images')->with('videos')->paginate(10);
			$result['success']=true;
			$result['data']=$images;
			return response()->json($result);
		}
		elseif ($this->checkRole != 1 || $this->checkRole != 2 || $this->checkRole != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		$constituency = Constituency::where('id', $id)->with('det')->with('threats')->with('images')->with('videos')->paginate(10);
		$result['success']=true;
		$result['data']=$constituency;
		return response()->json($result);
	}

	public function getConstituencyDelete($id){
		if ($this->checkRole != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		$constituency=Constituency::where('id', $id)->delete();
		$result['success']=true;
		$result['message']='Constituency deleted successfully';
		return response()->json($result);
	}

	public function postConstituencyCreate(Request $request,Constituency $constituency){
		if ($this->checkRole != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		$validator = Validator::make($request->all(), [ 
			'name' => 'required', 
			'rp_name' => 'required', 
			'op_name' => 'required',  
		]);

		if ($validator->fails()) { 
			$result['success'] = false;
			$result['message'] = 'Invalid inputs';
			$result['error'] = $validator->errors();		
			return response()->json($result);
		}

		$constituency = new Constituency;
		$constituency->name = $request->get('name');
		$constituency->remark = $request->get('remark');
		$constituency->rp_name = $request->get('rp_name');
		$constituency->op_name = $request->get('op_name');
		$constituency->det_id = $request->get('det');
		$save = $constituency->save();

		if ($save) {
			$result['success'] = true;
			$result['message'] = 'Constituency created successfully';	
			return response()->json($result);
		}
		$result['success'] = false;
		$result['message'] = 'Constituency can not be created';	
		return response()->json($result);
	}

	public function postConstituencyEdit(Request $request, $id){
		if ($this->checkRole != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		$constituency = Constituency::where('id', $id)->first();
		$constituency->name = $request->get('name', $constituency->name);
		$constituency->remark = $request->get('remark', $constituency->remark);
		$constituency->rp_name = $request->get('rp_name', $constituency->rp_name);
		$constituency->op_name = $request->get('op_name', $constituency->op_name);
		$constituency->det_id = $request->get('det_id', $constituency->det_id);
		$update = $constituency->update();

		if ($update) {
			$result['success'] = true;
			$result['message'] = 'Constituency updated successfully';	
			return response()->json($result);
		}
		$result['success'] = false;
		$result['message'] = 'Constituency can not be updated';	
		return response()->json($result);
	}
}
