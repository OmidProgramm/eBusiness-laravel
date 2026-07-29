<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\InfoController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\SocialController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\front\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/',[IndexController::class,'index'])->name('show-website');
Route::get('/category/{id}',[IndexController::class,'category'])->name('index.category');
Route::get('/product/{titleC}/{id}',[IndexController::class,'product'])->name('index.product');
Route::post('/ajax-contact',[IndexController::class,'ajaxContact'])->name('ajax-contact');
Route::post('/comments',[IndexController::class,'ajaxComments'])->name('ajax-comments');

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
        // Category CRUD
        Route::resource("/category",CategoryController::class)->parameters(["category"=>"id"]);
        // End Category CRUD
        // product CRUD
        Route::resource("/product",ProductController::class)->parameters(["product"=>"id"]);
        // End product CRUD
    
        // Information CRUD
        Route::resource("/info",InfoController::class)->parameters(["info"=>"id"]); 
        // End Info CRUD

        // Social CRUD
        Route::resource("/social",SocialController::class)->parameters(["social"=>"id"]); 
        // contact CRUD
        Route::get("/contact",[ContactController::class,'index'])->name('contact.index'); 
        Route::delete("/contact/{id}",[ContactController::class,'destroy'])->name('contact.destroy');
        // End contact CRUD
        // Comment CRUD
        Route::get("/comment",[CommentController::class,'index'])->name('comment.index'); 
        Route::delete("/comment/{id}",[CommentController::class,'destroy'])->name('comment.destroy');
        // End Comment CRUD
});
