<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\MessageController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/user/register',[ApiController::class,'userRegister']);
Route::post('/user/login',[ApiController::class,'userLogin']);
Route::get('/product/list', [ApiController::class, 'productList']);
Route::post('/product/detail',[ApiController::class,'productDetail']);

Route::post('/product/cart',[ApiController::class,'productCart']);
Route::post('/product/cart/list',[ApiController::class,'productCartList']);
Route::post('/product/cart/item/delete',[ApiController::class,'singleCartDelete']);
Route::get('/product/view/{id}',[ApiController::class,'productView']);

Route::post('/order/list',[ApiController::class,'orderList']);
Route::post('/customer/review',[ApiController::class,'customerReview']);
Route::get('/show/review/{reviewId}',[ApiController::class,'showReview']);
Route::get('/review/delete/{id}',[ApiController::class,'reviewDelete']);

Route::post('/get/noti/list',[ApiController::class,'notiList']);

//product home
Route::get('/product/discount',[ApiController::class,'productDiscount']);


//chat
 Route::post('/chat/messages', [MessageController::class, 'store']);
Route::get('/chat/messages', [MessageController::class, 'index']);