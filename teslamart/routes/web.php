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
Route::get('/admin/brand/add-brand',[BrandController::class,'addBrand'])->name('brand.add-brand');