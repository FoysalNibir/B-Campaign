<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;  
use Illuminate\Support\Facades\Auth; 
use Validator;

use App\Det;
use App\Constituency;
use App\Image;

class ImageController extends Controller
{	
	public function getConstituencyNames(){
		if ($this->checkRole != 1 || $this->checkRole != 2 || $this->checkRole != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		$constituencyNames = Constituency::select('id','name')->get();
		$result['success']=true;
		$result['data']=$constituencyNames;
		return response()->json($result);
	}
	public function getImages($id){
		if ($this->checkRole == 4) {
			$images = Image::where('constituency_id', $id)->whereHas('constituency', 
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
		$images = Image::where('constituency_id', $id)->paginate(10);
		$result['success']=true;
		$result['data']=$images;
		return response()->json($result);
	}

	public function getImageDelete($id){
		if ($this->checkRole != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		$image = Image::where('id', $id)->delete();
		$result['success']=true;
		$result['message']='Image deleted successfully';
		return response()->json($result);
	}

	public function postImageCreate(Request $request,Image $image){
		if ($this->checkRole != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		$validator = Validator::make($request->all(), [ 
			'date' => 'required|date', 
			'time' => 'required', 
			'caption' => 'required',
			'image' => 'required'
		]);

		if ($validator->fails()) { 
			$result['success'] = false;
			$result['message'] = 'Invalid inputs';
			$result['error'] = $validator->errors();		
			return response()->json($result);
		}

		$image = new Image;
		$image->date = $request->get('date');
		$image->time = $request->get('time');
		$image->caption = $request->get('caption');

		$img_url = "image-".time().".jpg";
		$imageDBName = 'storage\\production\\images\\'.$img_url;

		$image_string = $request->get('image');
		$image_file = base64_decode($image_string);

		$path = public_path() . "\\storage\\production\\images\\" . $img_url;
		$success = file_put_contents($path, $image_file);
		$image->image = $imageDBName;

		$image->constituency_id = $request->get('constituency_id');
		$save = $image->save();

		if ($save) {
			$result['success']=true;
			$result['data']='Image uploaded successfully';
			return response()->json($result);
			
		}
		$result['success']=false;
		$result['data']='Image can not be uploaded';
		return response()->json($result);
	}

	public function postImageUpdate(Request $request,$id){
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

		$image = Image::where('id',$id)->first();
		$image->date = $request->get('date', $image->date);
		$image->time = $request->get('time', $image->time);
		$image->caption = $request->get('caption', $image->caption);

		if ($request->has('image')){

			$old_path = public_path().'\\'.$image->image;
			unlink($old_path);

			$img_url = "image-".time().".jpg";
			$imageDBName = 'storage\\production\\images\\'.$img_url;

			$image_string = $request->get('image');
			$image_file = base64_decode($image_string);

			$path = public_path() . "\\storage\\production\\images\\" . $img_url;
			$success = file_put_contents($path, $image_file);
			$image->image = $imageDBName;
		}
		
		$update = $image->update();

		if ($update) {
			$result['success']=true;
			$result['data']='Image updated successfully';
			return response()->json($result);
			
		}
		$result['success']=false;
		$result['data']='Image can not be updated';
		return response()->json($result);
	}
}
