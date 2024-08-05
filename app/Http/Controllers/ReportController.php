<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customerReview;

class ReportController extends Controller
{
    //product view

    function productView(){
        $data = customerReview::select('customer_reviews.*','users.name as user_name')
        ->join('users','customer_reviews.user_id','users.id')
        ->orderBy('customer_reviews.created_at', 'desc')->get();
        return view('report.productView',compact('data'));
    }

    //product sale
    function productSale(){
        return view('report.sale');
    }

    //customer order
    function customerOrder(){
        return view('report.customerOrder');
    }
}