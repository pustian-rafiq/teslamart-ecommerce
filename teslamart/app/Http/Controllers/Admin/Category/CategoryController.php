<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function categoryIndex(){
    	 
    	return view('admin.category.category');
    }
     public function getCategory(){
    	$categories = Category::orderBy('id','DESC')->get();
    	return $categories;
    }

    public function addNewCategory(Request $req){
       
     $cat_name= $req->input('cat_name');
     $cat_slug = str_slug($cat_name,'-');
     $result= Category::insert([
        'cat_name'=>$cat_name,
        'cat_slug'=>$cat_slug,
     	 
     ]);
        
        if ($result == true) {
            return 1;
        }else{
            return 0;
        }
    }  

// Delete Category with page refresh
   public function deleteCategory($id){
    	  $category = Category::find($id);
	      $category->delete();
	      $notification=array(
         'message'=>'Category has been Deleted Successfully',
         'alert-type'=>'success'
               );
		 return Redirect()->back()->with($notification);
	      // return response()->json([
	      //   'success' => 'Category deleted successfully!'
	      // ]);
    } 



    public function getCategoryDetails(Request $req){
        $id = $req->input('id');
        $result = Category::where('id',$id)->get();
        return $result;
    }  



 public function categoryUpdate(Request $req){
     $id= $req->input('id');
     $cat_name= $req->input('cat_name');
     $cat_slug = str_slug($cat_name,'-');

      $result= Category::where('id','=',$id)->update([
     	'cat_name'=>$cat_name,
     	'cat_slug'=>$cat_slug,
     	 
     ]);
        
        if ($result == true) {
            return 1;
        }else{
            return 0;
        }
    }
    
// Delete Category without page refresh using ajax call
   public function deleteCategoryUsingAjax($id){
    	  $category = Category::find($id);
	      $category->delete();
	       
	      return response()->json([
	        'success' => 'Category deleted successfully!'
	      ]);
    }      
}
