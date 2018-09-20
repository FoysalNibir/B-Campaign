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

class DetController extends Controller
{
    public function getDets(){
		$dets = Det::paginate(10);
		return View::make('det.det',compact('dets'));
	}

	public function getDetDelete($id){
		$det=Det::where('id', $id)->delete();
		return Redirect()->back()->with('status','DET deleted successfully');
	}

	public function getDetCreate(){
		return View::make('det.create');
	}

	public function postDetCreate(Request $request,Det $det){
		$det = new Det;
		$det->name = $request->get('name');
		$det->remark = $request->get('remark');
		$save = $det->save();

		if ($save) {
			return Redirect()->back()->with('status','DET created successfully');
		}
		return Redirect()->back()->with('error', 'DET could not be created');
	}

	public function getDetsEdit($id){
		$det = Det::where('id', $id)->first();
		return View::make('det.update', compact('det'));
	}

	public function postDetsEdit(Request $request, $id){
		$det = Det::where('id', $id)->first();
		$det->name = $request->get('name', $det->name);
		$det->remark = $request->get('remark', $det->remark);
		$update = $det->update();
		if ($update) {
			return Redirect()->back()->with('status','DET updated successfully');
		}
		return Redirect()->back()->with('error', 'DET could not be updated');
	}
}
