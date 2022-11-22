<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\userController;
use App\Http\Controllers\vendorController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', function () {
    // return view('dashboard');
    if(Auth::user()->role == 'vendor'){
        return view('vendor.index');
    }elseif(Auth::user()->role == 'admin'){
        return view('admin.index');
    }elseif(Auth::user()->role == 'user'){
        return view('user.index');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
Route::middleware([ 'web', 'admin'])->group(function(){
Route::resource('/admin', adminController::class);
});

Route::middleware(['web', 'vendor'])->group(function(){
    Route::resource('/vendor', vendorController::class);
});
Route::middleware([ 'web', 'user'])->group(function () {
    Route::resource('/user', userController::class);
});

Route::get('send-mail', [MailController::class, 'index']);