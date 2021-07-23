<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
{
    public function showSubSubCategory(){
    	return view('admin.subsubcategory.subsubcategory');
    }
}
