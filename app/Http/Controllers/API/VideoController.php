<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;  
use Illuminate\Support\Facades\Auth; 
use Validator;

use App\Det;
use App\Constituency;
use App\Video;

class VideoController extends Controller
{	
    public function getVideos($id){
    	if ($this->checkRole == 4) {
			$images = Video::where('constituency_id', $id)->whereHas('constituency', 
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
		$videos = Video::where('constituency_id', $id)->paginate(10);
		$result['success']=true;
		$result['data']=$videos;
		return response()->json($result);
	}

	public function getVideoDelete($id){
		if ($this->checkRole != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		$image = Video::where('id', $id)->delete();
		$result['success']=true;
		$result['message']='Video deleted successfully';
		return response()->json($result);
	}

	public function postVideoCreate(Request $request,Video $video){
		if ($this->checkRole != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		$validator = Validator::make($request->all(), [ 
			'date' => 'required|date', 
			'time' => 'required', 
			'caption' => 'required',
			'video' => 'required'
		]);

		if ($validator->fails()) { 
			$result['success'] = false;
			$result['message'] = 'Invalid inputs';
			$result['error'] = $validator->errors();		
			return response()->json($result);
		}

		$video = new Video;
		$video->date = $request->get('date');
		$video->time = $request->get('time');
		$video->caption = $request->get('caption');

		$vdo_url = "video-".time().".mp4";
		$imageDBName = 'storage\\production\\videos\\'.$vdo_url;

		$vdo_string = $request->get('video');
		$vdo_file = base64_decode($vdo_string);

		$path = public_path() . "\\storage\\production\\videos\\" . $vdo_url;
		$success = file_put_contents($path, $vdo_file);
		$video->video = $imageDBName;

		$video->constituency_id = $request->get('constituency_id');
		$save = $video->save();

		if ($save) {
			$result['success']=true;
			$result['data']='Video uploaded successfully';
			return response()->json($result);
			
		}
		$result['success']=false;
		$result['data']='Video can not be uploaded';
		return response()->json($result);
	}

	public function postVideoUpdate(Request $request,$id){
		if ($this->checkRole != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		$validator = Validator::make($request->all(), [ 
			'date' => 'date'
		]);

		if ($validator->fails()) { 
			$result['success'] = false;
			$result['message'] = 'Invalid inputs';
			$result['error'] = $validator->errors();		
			return response()->json($result);
		}

		$video = Video::where('id',$id)->first();
		$video->date = $request->get('date', $video->date);
		$video->time = $request->get('time', $video->time);
		$video->caption = $request->get('caption', $video->caption);

		if ($request->has('video')){

			$old_path = public_path().'\\'.$video->video;
			unlink($old_path);

			$vdo_url = "video-".time().".mp4";
			$vdoDBName = 'storage\\production\\videos\\'.$vdo_url;

			$image_string = $request->get('video');
			$image_file = base64_decode($image_string);

			$path = public_path() . "\\storage\\production\\videos\\" . $vdo_url;
			$success = file_put_contents($path, $image_file);
			$video->video = $vdoDBName;
		}
		
		$update = $video->update();

		if ($update) {
			$result['success']=true;
			$result['data']='Video updated successfully';
			return response()->json($result);
			
		}
		$result['success']=false;
		$result['data']='Video can not be updated';
		return response()->json($result);
	}
}
