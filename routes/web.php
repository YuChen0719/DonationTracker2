<?php

use App\Http\Controllers\CharityController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\CategoryController;
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
    return view('auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('donation', DonationController::class);
    Route::resource('user', UserController::class);
});

//donation middleware
Route::middleware(['auth:sanctum', 'verified'])->post('/donation/create',[DonationController::class,'post_create'] )->name('post_create_donation');
Route::middleware(['auth:sanctum', 'verified'])->get('/donation/edit/{id}',[DonationController::class,'edit_donation'] )->name('edit_donation');
Route::middleware(['auth:sanctum', 'verified'])->post('/donation/edit/{id}',[DonationController::class,'post_edit'] )->name('post_edit_donation');
Route::middleware(['auth:sanctum', 'verified'])->get('/donation/deactivate/{id}',[DonationController::class,'deactivate'] )->name('deactivate_donation');
Route::middleware(['auth:sanctum', 'verified'])->get('/donation/activate/{id}',[DonationController::class,'activate'] )->name('activate_donation');
// Route::middleware(['auth:sanctum', 'verified'])->get('/donation/edit/{id}',[DonationController::class,'edit'] )->name('edit_donation');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', \App\Http\Controllers\UsersController::class);
});

//charity middleware
Route::middleware(['auth:sanctum', 'verified'])->get('/charity',[CharityController::class,'GetAllCharity'] )->name('charity');
Route::middleware(['auth:sanctum', 'verified'])->get('/charity/mine',[CharityController::class,'GetAllMyCharity'] )->name('my_charity');
Route::middleware(['auth:sanctum', 'verified'])->get('/charity/create',[CharityController::class,'create'] )->name('create_charity');
Route::middleware(['auth:sanctum', 'verified'])->post('/charity/create',[CharityController::class,'post_create'] )->name('post_create_charity');
Route::middleware(['auth:sanctum', 'verified'])->get('/charity/deactivate/{id}',[CharityController::class,'deactivate'] )->name('deactivate_charity');
Route::middleware(['auth:sanctum', 'verified'])->get('/charity/activate/{id}',[CharityController::class,'activate'] )->name('activate_charity');
Route::middleware(['auth:sanctum', 'verified'])->get('/charity/edit/{id}',[CharityController::class,'edit'] )->name('edit_charity');
Route::middleware(['auth:sanctum', 'verified'])->post('/charity/edit/{id}',[CharityController::class,'post_edit'] )->name('post_edit_charity');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('category', CategoryController::class);
});

#Route::get('/', function () {
    #return view('auth/login');
#});
#Route::get('/', function () {
#    return view('login');
#});



//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');





//
// Route::get('/donation', function () {
//     return view('donation');
// });
