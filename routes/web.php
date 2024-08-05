<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;




Route::middleware('guest')->group(function () {
    Route::redirect('/','login');
    Route::get('login', function(){
        return view('auth.login');
    })->name('login');
    Route::get('register', function () {
        return view('auth.register');
    })->name('register');


    Route::get('/auth/google', [LoginController::class, 'redirect'])->name('google-auth');
    Route::get('/auth/google/call-back', [LoginController::class, 'callbackGoogle']);

});






Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

//profile
Route::get('/profile',[ProfileController::class,'profile'])->name('profile');
Route::get('/edit/profile', [ProfileController::class,'editProfile'])->name('edit#profile');
Route::post('/profile/edit', [ProfileController::class,'profileEdit'])->name('profile#edit');
Route::get('/password/change/page',[ProfileController::class,'passwordChangePage'])->name('password#changePage');
Route::post('/password/change',[ProfileController::class,'passwordChange'])->name('password#change');
//product list

Route::get('/products/list', [ProductController::class, 'productList'])->name('product#list');
Route::get('/create/product', [ProductController::class, 'createProduct'])->name('create#product');
Route::post('/product/create', [ProductController::class, 'productCreate'])->name('product#create');
Route::get('/edit/product/{id}', [ProductController::class, 'editProduct'])->name('edit#product');
Route::post('/product/edit', [ProductController::class, 'productEdit'])->name('product#edit');
Route::get('/delete/multiple/product',[ProductController::class,'deleteMultipleProduct'])->name('delete#multipleProduct');
    Route::get('/single/delete/{id}', [ProductController::class, 'singleDelete'])->name('single#delete');



//category list
Route::get('/categories/list', [CategoryController::class, 'categoryList'])->name('category#list');
Route::get('/create/category',[CategoryController::class, 'createCategory'])->name('create#category');
Route::post('category/create',[CategoryController::class, 'categoryCreate'])->name('category#create');
Route::get('/category/delete/{id}',[CategoryController::class, 'categoryDelete'])->name('category#delete');
Route::get('edit/category/{id}',[CategoryController::class, 'editCategory'])->name('edit#category');
Route::post('category/edit',[CategoryController::class, 'categoryEdit'])->name('category#edit');


//sale
Route::get('order/list',[OrderController::class, 'orderList'])->name('order#list');
Route::get('change/status',[OrderController::class, 'changeStatus'])->name('change#status');
Route::get('order/detail/{id}',[OrderController::class, 'orderDetail'])->name('order#detail');

//customer list
Route::get('customer/list',[CustomerController::class, 'customerList'])->name('customer#list');
Route::get('customer/detail',[CustomerController::class, 'customerDetail'])->name('customer#detail');

//product view
Route::get('product/view',[ReportController::class,'productView'])->name('product#view');
Route::get('product/sale',[ReportController::class,'productSale'])->name('product#sale');
Route::get('customer/order',[ReportController::class,'customerOrder'])->name('customer#order');


//user list
Route::get('user/list',[UserController::class,'userList'])->name('user#list');
Route::get('user/multiple/delete',[UserController::class,'userMultipleDelete'])->name('user#multipleDelete');
Route::get('user/delete/{id}',[UserController::class,'userDelete'])->name('user#delete');
Route::get('user/change/role',[UserController::class,'userChangeRole'])->name('user#changeRole');
Route::get('admin/list',[UserController::class,'adminList'])->name('admin#list');
Route::get('admin/multiple/delete',[UserController::class,'adminMultipleDelete'])->name('admin#multipleDelete');
Route::get('admin/delete/{id}',[UserController::class,'adminDelete'])->name('admin#delete');
Route::get('admin/change/role',[UserController::class,'adminChangeRole'])->name('admin#changeRole');

});