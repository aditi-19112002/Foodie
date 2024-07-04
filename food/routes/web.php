<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;

Route::get('/', [FoodController::class, 'index'])->name('home');
Route::match(["get", "post"], "/insert", [FoodController::class, 'insert'])->name('insert');
Route::match(["get", "post"], "/login", [FoodController::class, 'login'])->name('login');
Route::match(["get", "post"], "/signup", [FoodController::class, 'signup'])->name('signup');
Route::get("/logout",[FoodController::class,'logout'])->name('logout');  


Route::middleware(['auth'])->group(function () {
    Route::controller(OrderController::class)->group(function () {
        Route::get("/addToCart/{id}", "addToCart")->name("addToCart");
        Route::get("/removeFromCart/{id}", "removeFromCart")->name("removeFromCart");
        Route::get("/cart", "cart")->name("cart");
    });
});


// admin routes
Route::get("/admin/logout", [AdminController::class, 'logout'])->name('adminlogout');
Route::match(["get", "post"], "/admin/login", [AdminController::class, 'login'])->name('adminlogin');
Route::middleware('auth:admin')->group(function (){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/manage-products', [AdminController::class, 'manageProducts'])->name('admin.manage-products');
    Route::delete('/admin/manage-products/{id}', [AdminController::class, 'deleteProduct'])->name('admin.delete-product');
});


