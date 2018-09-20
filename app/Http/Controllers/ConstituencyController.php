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

class ConstituencyController extends Controller
{
    public function getConstituencies(){
		$constituencies = Constituency::with('det')->paginate(10);
		return View::make('constituency.read',compact('constituencies'));
	}

	public function getConstituencyDelete($id){
		$constituency=Constituency::where('id', $id)->delete();
		return Redirect()->back()->with('status','Constituency deleted successfully');
	}

	public function getConstituencyCreate(){
		$dets = Det::get();
		return View::make('constituency.create', compact('dets'));
	}

	public function postConstituencyCreate(Request $request,Constituency $constituency){
		$constituency = new Constituency;
		$constituency->name = $request->get('name');
		$constituency->remark = $request->get('remark');
		$constituency->rp_name = $request->get('rp_name');
		$constituency->op_name = $request->get('op_name');
		$constituency->det_id = $request->get('det');
		$save = $constituency->save();

		if ($save) {
			return Redirect()->back()->with('status','Constituency created successfully');
		}
		return Redirect()->back()->with('error', 'Constituency could not be created');
	}

	public function getConstituencyEdit($id){
		$constituency = Constituency::where('id', $id)->with('det')->first();
		$dets = Det::get();
		return View::make('constituency.update', compact('constituency','dets'));
	}

	public function postConstituencyEdit(Request $request, $id){
		$constituency = Constituency::where('id', $id)->first();
		$constituency->name = $request->get('name', $constituency->name);
		$constituency->remark = $request->get('remark', $constituency->remark);
		$constituency->rp_name = $request->get('rp_name', $constituency->rp_name);
		$constituency->op_name = $request->get('op_name', $constituency->op_name);
		$constituency->det_id = $request->get('det', $constituency->det_id);
		$update = $constituency->update();
		if ($update) {
			return Redirect()->back()->with('status','Constituency updated successfully');
		}
		return Redirect()->back()->with('error', 'Constituency could not be updated');
	}
}
