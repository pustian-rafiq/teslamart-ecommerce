<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;
use Illuminate\Support\Str;
class BrandController extends Controller
{
    public function showBrand(){
    	$brands = Brand::orderBy('id','DESC')->get();
    	return view('admin.brand.brand',compact('brands'));
    }
    public function addBrand(Request $request){
    	 $brand = new Brand();
    	 $brand->brand_name = $request->brand_name;
    	 $brand->brand_slug = str_slug($request->brand_name,'-');
    	 $brand->save();

    	 $notification=array(
	         'message'=>'Brand Inserted Successfully',
	         'alert-type'=>'success'
	               );
			 return Redirect()->back()->with($notification);
    }

    public function activateBrandStatus($id){
    	 
    	 $brand = Brand::find($id);
    	 
        $brand->brand_status = 1;
    	$brand->save();

	    $notification=array(
         'message'=>'Brand activated Successfully',
         'alert-type'=>'success'
               );
		 return Redirect()->back()->with($notification);
    }
    public function deactivateBrandStatus($id){
    	 
    	 $brand = Brand::find($id);
    	 $brand->brand_status = 0;
    	 $brand->save();

	    $notification=array(
         'message'=>'Brand deactivated Successfully',
         'alert-type'=>'success'
               );
		 return Redirect()->back()->with($notification);

    	
    }
}
