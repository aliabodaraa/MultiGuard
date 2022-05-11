<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Routing\Router;

Route::prefix("admin")->name("admin.")->namespace('Admin')->group(function(){
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.admin.login')->name('login');
        Route::view('/hello','dashboard.admin.hello')->name('hello');
        Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        // Route::middleware(['role:admin'])->group(function (Router $router) {
        // Route::view('/home','dashboard.admin.home')->name('home');
        // });
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
        Route::view('/info','dashboard.admin.info')->name('info');
    });
});

?>
