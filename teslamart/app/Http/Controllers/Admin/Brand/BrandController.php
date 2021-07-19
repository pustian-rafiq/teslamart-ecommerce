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

    // Add new brand 
    public function addBrand(Request $request){
    	$request->validate([
		    'brand_name' => 'bail|required|unique:brands,brand_name|min:2|max:25',
		    
		]);

    	 $brand = new Brand();
    	 $brand->brand_name = $request->brand_name;
    	 $brand->brand_slug = str_slug($request->brand_name,'-');


    	 $image = $request->file('brand_logo');
    		if ($image) {
    			$image_name = date('dmy_H_s_i');
    			$ext = strtolower($image->getClientOriginalExtension());
    			$image_full_name = $image_name.'.'.$ext;
    			$upload_path = 'media/brand/';
    			$image_url = $upload_path.$image_full_name;
    			$success = $image->move($upload_path,$image_full_name);
    			//$data['brand_logo'] = $image_url;
    			$brand->brand_logo = $image_url;
    			$brand->save();
    			//$brand = DB::table('brands')->insert($data);
    			$notification=array(
                 'message'=>'Brand Inserted Successfully with logo!',
                 'alert-type'=>'success'
                       );
    			 return Redirect()->back()->with($notification);
           
    		}else{
             // $brand=DB::table('brands')->insert($data);
    			$brand->save();
                 $notification=array(
                     'message'=>'Brand Inserted Successfully without logo!',
                     'alert-type'=>'success'
                      );
                return Redirect()->back()->with($notification); 
            }
    
    }

// Change brand status  with page refresh

   //  public function activateBrandStatus($id){
    	 
   //  	 $brand = Brand::find($id);
    	 
   //      $brand->brand_status = 1;
   //  	$brand->save();

	  //   $notification=array(
   //       'message'=>'Brand activated Successfully',
   //       'alert-type'=>'success'
   //             );
		 // return Redirect()->back()->with($notification);
   //  }

  // Change brand status  with page refresh
    
   //  public function deactivateBrandStatus($id){
    	 
   //  	 $brand = Brand::find($id);
   //  	 $brand->brand_status = 0;
   //  	 $brand->save();

	  //   $notification=array(
   //       'message'=>'Brand deactivated Successfully',
   //       'alert-type'=>'success'
   //             );
		 // return Redirect()->back()->with($notification);

    	
   //  }

  // Show brand edit page using previous data
    public function brandEdit($id){
    	$brand = Brand::find($id);
    	return view('admin.brand.edit',compact('brand'));
    	 
    }

  // Update brand using particular id
    
     public function brandUpdate(Request $request, $id){

    	 $oldlogo=$request->old_logo;
         $brand = Brand::find($id);
    	 
         $brand->brand_name = $request->brand_name;
    	 $brand->brand_slug = str_slug($request->brand_name,'-');


    	 $image = $request->file('brand_logo');
    		if ($image) {
    			$image_name = date('dmy_H_s_i');
    			$ext = strtolower($image->getClientOriginalExtension());
    			$image_full_name = $image_name.'.'.$ext;
    			$upload_path = 'media/brand/';
    			$image_url = $upload_path.$image_full_name;
    			$success = $image->move($upload_path,$image_full_name);
    			//$data['brand_logo'] = $image_url;
    			$brand->brand_logo = $image_url;
    			$brand->save();
    			//$brand = DB::table('brands')->insert($data);
    			$notification=array(
                 'message'=>'Brand updated Successfully with logo!',
                 'alert-type'=>'success'
                       );
    			 return Redirect()->route('brand.brand-list')->with($notification);
           
    		}else{
             // $brand=DB::table('brands')->insert($data);
    			$brand->save();
                 $notification=array(
                     'message'=>'Brand updated Successfully without logo!',
                     'alert-type'=>'success'
                      );
                return Redirect()->route('brand.brand-list')->with($notification); 
            }
    }

// Change brand status using ajax without page refresh
public function brandStatus($id, $status){
    	 $brand = Brand::find($id);
    	 
    	 $brand->brand_status = $status;
    	$result = $brand->save();
	  
	  if ($result && $status == 1) {
	  	 return response()->json(['success' => 'Status Activated Successfully']);
	  }else if($result && $status == 0){
	  	 return response()->json(['success' => 'Status Deactivated Successfully']);
	  }else{
	  	 return response()->json(['failed' => 'Status Deactivated Successfully']);
	  }
		

    }

// Delete particular brand

    public function deleteBrand($id){
    	 $brand = Brand::find($id);
    	 
    	 $brand->delete();

	    $notification=array(
         'message'=>'Brand Deleted Successfully',
         'alert-type'=>'success'
               );
		 return Redirect()->back()->with($notification);

    }
}
