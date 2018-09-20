<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Carbon\Carbon;
use Validator;

class FileController extends Controller
{
	public $successStatus = 200;
	public $unauthorisedStatus = 401;
	public $invalidStatus= 406;
	public $failedStatus = 403;

	public function postUpdateAvatar(Request $request){
		if ($this->checkRole != 1 || $this->checkRole != 2 || $this->checkRole != 5) {
			$result['success']=false;
			$result['message']='Unauthorised';
			return response()->json($result);
		}
		$user = Auth::user();
		$png_url = "avatar-".time().".jpg";
		$avatarDBName = 'storage\\photos\\users\\'.$png_url;

		$image_string = $request->get('avatar');
		$image = base64_decode($image_string);

		$path = public_path() . "\\storage\\photos\\users\\" . $png_url;
		$success = file_put_contents($path, $image);
		$user->avatar = $avatarDBName;
		$user->save();

		$result['success']=true;
		$result['message']='Avatar updated successfully';
		return response()->json($result);
	}
}
