<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Image;
use App\Models\Order;
use App\Models\CustomerOrder;
use App\Models\Payment;
use App\Models\Discount;
use App\Models\CustomerReview;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ApiController extends Controller
{
    //user Register
    function userRegister(Request $request){
        $data = [
            'name' => $request->userName,
            'email' => $request->userEmail,
            'password' => Hash::make($request->userPassword)
        ];
        User::create($data);
        $user = User::where('email',$request->userEmail)->first();
                return response()->json([
                    'user' => $user,
                    'token' => $user->createToken(time())->plainTextToken
                ]);

    }

    //user login
    function userLogin(Request $request){
        $user = User::where('email' ,$request->userEmail)->first();
        if(isset($user)){
            if(Hash::check($request->userPassword,$user->password)){
                return response()->json([
                    'user' => $user,
                    'token' => $user->createToken(time())->plainTextToken
                ]);
            }else{
                  return response()->json([
                    'user' => null,
                    'token' => null
                ]);
            }
        }else{
                  return response()->json([
                    'user' => null,
                    'token' => null
                ]);
            }
    }

    //product list
    function productList(){
        $data = Product::select('products.*','categories.name as category_name')
        ->join('categories','products.category_id','categories.id')
        ->with(['images','discounts','colors','sizes','reviews'])
        ->orderBy('created_at','desc')->withAvg('reviews','rating')->get();
        return response()->json([
            'data' => $data,
            'status' => 'success',
        ]);
    }

    //product view
    function productView($id){
        $product = Product::find($id);
        if($product){
            $product->increment('view_count');
        }
    }

    //product detail
    function productDetail(Request $request){
        $data = Product::where('id',$request->productId)->with(['images','discounts','category','colors','sizes'])->first();
        return response()->json([
            'product' =>  $data,
        ]);
    }

    //product cart
    function productCart(Request $request){
        $data=[
            'product_id'=>$request->productId,
            'user_id' => $request->userId,
            'size' => $request->size,
            'color' => $request->color,
            'image' => $request->image,
            'qty' => $request->qty,
        ];
        Cart::create($data);

        return response()->json([
            'status' =>  'success',
        ]);
    }

    //product cart list
    function productCartList(Request $request){
        $data = Cart::select('carts.*','products.name as product_name','products.price as product_price')
        ->leftJoin('products','carts.product_id','products.id')
        ->where('user_id',$request->id)
        ->get();
        return response()->json([
            'status' =>  'success',
            'cartList' => $data,
        ]);
    }



    //single cart delete
    function singleCartDelete(Request $request){
        Cart::where('id',$request->id)->delete();
    }

    //orderList
    function orderList(Request $request){
        $order=[
            'user_id' => $request->userId,
            'order_code' => $request->orderCode,
        ];
        $orderId=Order::create($order);
        $total = 0;
        foreach($request->order as $item){
            $data=[
                'order_id' => $orderId->id,
                'user_id' => $item['user_id'],
                'product_id' => $item['product_id'],
                'quantity' => $item['qty'],
                'orderCode' => $request->orderCode,
                'image' => $item['image'],
                'total_price' => $item['product_price']
            ];
            CustomerOrder::create($data);
        }
        $payment = [
            'order_id' =>$orderId->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'trans_id' => $request->transId,

        ];
        if($request->hasFile('image')){
            $path= $request->file('image')->store('image','public');
            $payment['image']=$path;
        }

        Payment::create($payment);
        Cart::where('user_id',$request->userId)->delete();
        return response()->json([
                'status' =>  'success',
            ]);

    }

    //customer Review
    function customerReview(Request $request){
        $product =Product::find($request->productId);
        if($product){
            $reviews = $product->reviews()->create([
                'user_id' => $request->userId,
                'product_id'=> $request->productId,
                'rating' => $request->rating ,
                'text' => $request->text,
            ]);
            return response()->json([
                'status' =>  'success',
            ]);
        }else{
            return response()->json([
                'status' =>  'product not found',
            ]);
        }
    }
    function showReview($reviewId){
        $getReview=CustomerReview::select('customer_reviews.*','users.name as user_name')
        ->join('users','customer_reviews.user_id','users.id')
        ->where('product_id',$reviewId)->orderBy('rating','desc')->get();
        return response()->json([
                'status' =>  'success',
                'reviews' => $getReview
            ]);
    }

    function reviewDelete($id){
        CustomerReview::where('id',$id)->delete();
    }

    // noti list
    function notiList(Request $request){
        $data = Order::where('user_id',$request->id)->with(['payments','orderLists'])->orderBy('created_at','desc')->get();
        return response()->json([
            'status' =>  'success',
            'notiList' => $data,
        ]);
    }

    function productDiscount(){
        // $data= Discount::select(['discounts.*','products.name as product_name','products.price as product_price','images.path as image'] )
        // ->leftJoin('products','discounts.product_id','products.id')
        // ->leftJoin('images','discounts.product_id','images.product_id')
        // ->get();
        $data=Product::where('cover','cover')->with(['discounts','images'])->orderBy('id','desc')->take(4)->get();
       return response()->json([
            'status' =>  'success',
            'discounts' => $data,
        ]);
    }

}
