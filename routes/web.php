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

Route::get('/list',[ListingController::class,'index'])->name('listings.index');
//url with parameter
Route::get('/about/{listing}',[ListingController::class,'show']);

// Route::resource('user',UserController::class);

// Route::resource('listing',ListingController::class);

Route::get('/create',[ListingController::class,'create'])->name('listings.create')->middleware('auth');

Route::post('/store',[ListingController::class,'store'])->name('listings.store')->middleware('auth');

Route::get('/edit/{listing}',[ListingController::class,'edit'])->name('listings.edit')->middleware('auth');

Route::put('/update/{listing}',[ListingController::class,'update'])->name('listings.update')->middleware('auth');

Route::delete('/delete/{listing}',[ListingController::class,'destroy'])->name('listing.destroy')->middleware('auth');

Route::get('/listing/manage',[ListingController::class,'manage'])->name('listings.manage')->middleware('auth');


Route::get('/register',[UserController::class,'create'])->name('users.register')->middleware('guest');
Route::post('/userstore',[UserController::class,'store'])->name('users.store')->middleware('guest');
Route::get('/logout',[UserController::class,'logout'])->name('users.logout')->middleware('auth');
Route::get('/login',[UserController::class,'login'])->name('users.login')->middleware('guest');
Route::post('/authenticate',[UserController::class,'authenticate'])->name('users.authenticate')->middleware('guest');
Route::get('button',function () {
    return view('buttontest');
});
