<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;  
use Illuminate\Support\Facades\Auth; 
use Validator;

use App\Det;
use App\User;
use App\Image;
use App\Video;
use App\Threat;
use App\Constituency;

class DashboardController extends Controller
{
    public function test(){
    	if (Auth::user()->role()->pluck('id')->first() == 1) {
    		return 'true';
    	}
    }
}
