<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\CustomerOrder;

class OrderController extends Controller
{
    //order list
    function orderList(){
        $data = Order::select('orders.*','users.name as user_name')
        ->join('users','orders.user_id','users.id')
        ->orderBy('created_at', 'desc')->get();
        return view('sale.orderList',compact('data'));
    }
    //change status
    function changeStatus(Request $request){
        $data = Order::find($request->order_id)->update([
            'status' => $request->status
        ]);
    }

    //order detail
    function orderDetail($id){
        $data = Order::select('orders.*','users.name as user_name')
        ->join('users','orders.user_id','users.id')
        ->where('orders.id', $id)->with('payments')->first();
        $order= CustomerOrder::where('order_id', $id)->get();
        // dd($data->orderLists());
        return view('sale.orderDetails',compact('data','order'));
    }

}