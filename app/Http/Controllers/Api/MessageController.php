<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    //
    public function index()
    {
        $messages = ChMessage::where('from_id', auth()->id())
                           ->orWhere('to_id', auth()->id())
                           ->get();

        return response()->json($messages);
    }

     public function store(Request $request)
    {
        $message = Chatify::newMessage($request);

        return response()->json($message);
    }
}