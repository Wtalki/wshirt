<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //customer list
    function customerList(){

        return view('customer.list');

    }

    //customer detail
    function customerDetail(){
        return view('customer.details');
    }


}
