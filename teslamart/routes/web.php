<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteHomeController;
use App\Http\Controllers\Admin\Brand\BrandController;
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