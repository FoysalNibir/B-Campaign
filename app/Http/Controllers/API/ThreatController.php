<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;  
use Illuminate\Support\Facades\Auth; 
use Validator;

use App\Det;
use App\Constituency;
use App\Threat;

class ThreatController extends Controller
{	
    public function getThreats($id){
    	if ($this->checkRole == 4) {
			$images = Threat::where('constituency_id', $id)->whereHas('constituency', 
							function($query) {
								$query->where('det_id', Auth::user()->dets()->pluck('id')->first());
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
		$threats = Threat::where('constituency_id', $id)->paginate(10);
		$result['success']=true;
		$result['data']=$threats;
		return response()->json($result);
	}

	public function getThreatDelete($id){
		if ($this->checkRole != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		$threat = Threat::where('id', $id)->delete();
		$result['success']=true;
		$result['message']='Video deleted successfully';
		return response()->json($result);
	}

	public function postThreatCreate(Request $request,Threat $threat){
		if ($this->checkRole != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		$validator = Validator::make($request->all(), [ 
			'date' => 'required|date', 
			'time' => 'required', 
			'description' => 'required',
			'title' => 'required',
			'level' => 'required|between:1,6',
			'link' => 'required'
		]);

		if ($validator->fails()) { 
			$result['success'] = false;
			$result['message'] = 'Invalid inputs';
			$result['error'] = $validator->errors();		
			return response()->json($result);
		}

		$threat = new Threat;
		$threat->title = $request->get('title');
		$threat->date = $request->get('date');
		$threat->time = $request->get('time');
		$threat->description = $request->get('description');
		$threat->level = $request->get('level');
		$threat->link = $request->get('link');
		$threat->constituency_id = $request->get('constituency_id');
		$save = $threat->save();

		if ($save) {
			$result['success']=true;
			$result['data']='Threat created successfully';
			return response()->json($result);
			
		}
		$result['success']=false;
		$result['data']='Threat can not be created';
		return response()->json($result);
	}

	public function postThreatUpdate(Request $request, $id){
		if ($this->checkRole != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		$validator = Validator::make($request->all(), [ 
			'date' => 'date', 
			'level' => 'between:1,6'
		]);

		if ($validator->fails()) { 
			$result['success'] = false;
			$result['message'] = 'Invalid inputs';
			$result['error'] = $validator->errors();		
			return response()->json($result);
		}

		$threat = Threat::where('id', $id)->first();
		$threat->title = $request->get('title', $threat->title);
		$threat->date = $request->get('date', $threat->date);
		$threat->time = $request->get('time', $threat->time);
		$threat->description = $request->get('description', $threat->description);
		$threat->level = $request->get('level', $threat->level);
		$threat->link = $request->get('link', $threat->link);
		$update = $threat->update();

		if ($update) {
			$result['success']=true;
			$result['data']='Threat updated successfully';
			return response()->json($result);
			
		}
		$result['success']=false;
		$result['data']='Threat can not be updated';
		return response()->json($result);
	}
}
