<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function showBrand(){
    	return view('admin.brand.brand');
    }
    public function addBrand(){
    	return view('admin.brand.brand');
    }
}
