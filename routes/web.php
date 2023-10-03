<?php

use Illuminate\Support\Facades\Route;


Route::get('/',[\App\Http\Controllers\PageController::class,'home'])->name('home');
Route::get('/products',[\App\Http\Controllers\PageController::class,'products'])->name('products');
Route::get('/products/category/{category}',[\App\Http\Controllers\PageController::class,'productFilter'])->name('products.action');
Route::get('/search/product',[\App\Http\Controllers\SearchController::class,'searchProduct'])->name('searchProduct');



//
Route::get('/login',[\App\Http\Controllers\AuthManager::class,'login'])->name('login');
Route::post('/login',[\App\Http\Controllers\AuthManager::class,'loginAction'])->name('login.action');
Route::get('/signup',[\App\Http\Controllers\AuthManager::class,'signup'])->name('signup');
Route::post('/signup',[\App\Http\Controllers\AuthManager::class,'signupAction'])->name('signupAction');
Route::get('/logout',[\App\Http\Controllers\AuthManager::class,'logout'])->name('logout');

//

Route::group(['middleware' => 'auth'], function () {
    Route::get('/product/{productId}',[\App\Http\Controllers\PageController::class,'product'])->name('product');
    Route::get('/user',[\App\Http\Controllers\PageController::class,'user'])->name('user-profile'); 
    Route::get('/cart',[\App\Http\Controllers\CartController::class,'cart'])->name('cart');
    Route::post('/product/{productId}',[\App\Http\Controllers\CartController::class,'addToCart'])->name('addToCart');
    Route::get('/cart/delete/{cartItem}',[\App\Http\Controllers\CartController::class,'delete'])->name('cart.delete.action');
    Route::get('/order',[\App\Http\Controllers\OrderController::class,'orderPage'])->name('order');
    Route::post('/order',[\App\Http\Controllers\OrderController::class,'storeOrder'])->name('order.create.action');
    Route::post('/order/sendOrder',[\App\Http\Controllers\OrderController::class,'sendOrder'])->name('sendOrder');
    Route::get('/order/confirm',[\App\Http\Controllers\OrderController::class,'orderConfirmPage'])->name('orderConfirmPage');
});

//

Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/admin/dashboard',[\App\Http\Controllers\AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile',[\App\Http\Controllers\AdminController::class,'profile'])->name('admin.profile');
    Route::get('/admin/users',[\App\Http\Controllers\AdminController::class,'users'])->name('admin.users.table');

});

Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/admin/users',[\App\Http\Controllers\UserController::class,'users'])->name('admin.users.table');
    Route::get('/admin/users/create',[\App\Http\Controllers\UserController::class,'create'])->name('admin.users.create.form');
    Route::post('/admin/users/create',[\App\Http\Controllers\UserController::class,'store'])->name('admin.users.create.action');
    Route::get('/admin/users/edit/{user}',[\App\Http\Controllers\UserController::class,'edit'])->name('admin.users.edit.form');
    Route::put('/admin/users/edit/{user}',[\App\Http\Controllers\UserController::class,'update'])->name('admin.users.edit.action');
    Route::get('/admin/users/delete/{user}',[\App\Http\Controllers\UserController::class,'delete'])->name('admin.users.delete.action');
    //product
    Route::get('/admin/prouducts',[\App\Http\Controllers\AdminProductController::class,'products'])->name('admin.products.table');
    Route::get('/admin/prouducts/create',[\App\Http\Controllers\AdminProductController::class,'createForm'])->name('admin.products.create.form');
    Route::post('/admin/prouducts/create/action',[\App\Http\Controllers\AdminProductController::class,'createAction'])->name('admin.product.create.action');
    Route::get('/admin/prouducts/edit/{product}',[\App\Http\Controllers\AdminProductController::class,'showProductForm'])->name('admin.products.edit.form');
    Route::put('/admin/prouducts/update/{product}',[\App\Http\Controllers\AdminProductController::class,'updateProductAction'])->name('admin.product.update.action');
    Route::get('/admin/prouducts/delete/{product}',[\App\Http\Controllers\AdminProductController::class,'deleteProductAction'])->name('admin.product.delete.action');
    //
    Route::get('/admin/inbox',[\App\Http\Controllers\AdminOrderController::class,'inboxPage'])->name('admin.inbox');
    Route::put('/admin/inbox/confirm/{order}',[\App\Http\Controllers\AdminOrderController::class,'confirmOrder'])->name('confirmOrder');
    //
   
});

