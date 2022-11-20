<?php

use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Request;
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
Route::get('/index',[AdminController::class,'index'])->name('index');

//Prevent backtrack to login page after loggedout and move to welome page, make backtrack to thedash
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
});
Route::get('/photo_showing',[PhotoController::class,'index'])->name('photo_showing');
Route::post('/store',[PhotoController::class,'store'])->name('store');
// Route::get('/user/home',function(){
//  return view('auth.login');
// });
// Route::middleware(['AccessToHome'])->group(function(){
//     Route::view('user/home','dashboard.user.home')->name('user.home');
//     Route::view('admin/home','dashboard.admin.home')->name('admin.home');
// });

?>
