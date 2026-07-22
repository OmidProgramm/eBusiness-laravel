<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\front\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/',[IndexController::class,'index'])->name('show-website');
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/verify', function () {
    return view('auth.verify');
});

Route::prefix('dashboard')->group(function () {
    // Admin & Seo
    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');
    Route::post('/admin/store', [AdminController::class, 'storeSeo'])
        ->name('admin.seo.store');
    Route::get('/admin/show', [AdminController::class, 'showDetails'])
        ->name('details.show');
    Route::delete('/admin/deleteSeo/{id}', [AdminController::class, 'deleteSeo'])
        ->name('delete.Seo');
        // End Admin & Seo

        // Slider CRUD
    Route::resource("/slider",SliderController::class)->parameters(["slider"=>"id"]);
        // End Slider CRUD
        // About CRUD
    Route::resource("/about",AboutController::class)->parameters(["about"=>"id"]);
        // End About CRUD
        // Team CRUD
    Route::resource("/team",TeamController::class)->parameters(["team"=>"id"]);
        // End Team CRUD
});
