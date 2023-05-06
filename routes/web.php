<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/list',[ListingController::class,'index']);
//url with parameter
Route::get('/about/{listing}',[ListingController::class,'show']);

// Route::resource('user',UserController::class);

// Route::resource('listing',ListingController::class);

Route::get('/create',[ListingController::class,'create'])->name('listings.create');

Route::post('/store',[ListingController::class,'store'])->name('listings.store');

Route::get('button',function () {
    return view('buttontest');
});
