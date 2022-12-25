<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Basecontroller;
use App\Http\Controllers\Admin controller;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[Basecontroller::class,'home']);
Route::get('/services',[Basecontroller::class,'services']);
Route::get('/company',[Basecontroller::class,'company']);
Route::get('/contact_us',[Basecontroller::class,'contact_us']);

 Route::get('/admin',[Admincontroller::class,'index']);

