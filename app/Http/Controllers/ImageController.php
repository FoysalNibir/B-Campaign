<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Redirect;
use View;
use App\Det;
use App\Constituency;
use App\Image;

class ImageController extends Controller
{
    public function getImages(){
		$images = Image::with('constituency')->paginate(10);
		return View::make('image.read',compact('images'));
	}

	public function getImageCreate(){
		$constituencies = Constituency::get();
		return View::make('image.create', compact('constituencies'));
	}

	public function postImageCreate(Request $request,Image $image){
		$validator = Validator::make($request->all(), [ 
			'date' => 'required|date', 
			'time' => 'required|time', 
			'caption' => 'required',  
		]);

		if ($validator->fails()) { 
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$image = new Image;
		$image->date = $request->get('date');
		$image->time = $request->get('time');
		$image->caption = $request->get('caption');

		$imageFile = $request->file('image');
		$destinationPath =public_path() . "\\storage\\production\\images\\" ;
      	$imageFile->move($destinationPath,$imageFile->getClientOriginalName());
      	$image->image = "storage\\production\\images\\" . $imageFile->getClientOriginalName();

		$image->constituency_id = $request->get('constituency');
		$save = $image->save();

		if ($save) {
			return Redirect()->back()->with('status','Constituency created successfully');
		}
		return Redirect()->back()->with('error', 'Constituency could not be created');
	}
}
