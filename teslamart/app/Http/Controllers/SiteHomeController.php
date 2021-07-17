<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteHomeController extends Controller
{
    public function homeIndex(){
    	return view('website.home');
    }
}
