<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Redirect;
use View;
use App\User;
use App\Role;
use App\Threat;

class DashboardController extends Controller
{
    public function getDashboard(){
    	$threats = Threat::with('constituency')->get();
    	return View::make('dashboard.contents', compact('threats'));
    }
}
