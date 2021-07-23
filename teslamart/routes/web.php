<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteHomeController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\Category\SubSubCategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[SiteHomeController::class,'homeIndex']);

// Auth routes
Auth::routes();
Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// Admin brand routes

Route::get('/admin/brand/brand-list',[BrandController::class,'showBrand'])->name('brand.brand-list');
Route::post('/admin/brand/add-brand',[BrandController::class,'addBrand'])->name('brand.add-brand');
Route::get('/admin/brand/edit/{id}',[BrandController::class,'brandEdit'])->name('brand.edit');
Route::post('/admin/brand/update/{id}',[BrandController::class,'brandUpdate'])->name('brand.update');
Route::get('/admin/brand/delete/{id}',[BrandController::class,'deleteBrand'])->name('brand.delete');
// Change brand status using ajax without page refresh
Route::get('/admin/brand/brandStatus/{id}/{status}',[BrandController::class,'brandStatus'])->name('brandStatus');
// Route::get('/admin/brand/activeBrandStatus/{id}',[BrandController::class,'activateBrandStatus'])->name('brand.active-status');
// Route::get('/admin/brand/deactiveBrandStatus/{id}',[BrandController::class,'deactivateBrandStatus'])->name('brand.deactive-status');



//Category Routes Here
Route::get('/admin/category/category-list',[CategoryController::class,'categoryIndex'])->name('category.category-list');
Route::get('/admin/category/getCategory',[CategoryController::class,'getCategory']);
Route::post('/admin/category/addNewCategory',[CategoryController::class,'addNewCategory']);
Route::post('/admin/category/getCategoryDetails',[CategoryController::class,'getCategoryDetails']);
Route::post('/admin/category/categoryUpdate',[CategoryController::class,'categoryUpdate']);
Route::get('/admin/category/delete/{id}',[CategoryController::class,'deleteCategory'])->name('category.delete');
// Route::get('/admin/category/delete/{id}',[CategoryController::class,'deleteCategoryUsingAjax'])->name('category.deleteWithAjax');




//Sub Category Routes Here
Route::get('/admin/category/subcategory/subcategory-list',[SubCategoryController::class,'showSubCategory'])->name('subcategory.subcategory-list');

//Sub Sub-Category Routes Here
Route::get('/admin/category/subsubcategory/subsubcategory-list',[SubSUbCategoryController::class,'showSubSubCategory'])->name('subsubcategory.subsubcategory-list');