<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
     public function showSubCategory(){
    	return view('admin.subcategory.subcategory');
    }
}
