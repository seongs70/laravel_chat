<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        //엔드로 묶이고
        $messages = Message::where(function($query){
            $query->where('from', request('from'));
            $query->where('to', request('to'));
            //or로 묶이고
        })->orWhere(function($query){
            $query->where('from', request('to'));
            $query->where('to', request('from'));
        })->get();

        return response()->json([
            //관계까지 다가져옴
            'messages' => $messages->load('from', 'to')
        ], 200);
    }
    public function store()
    {
        $validated = request()->validate([
           'text' => 'required',
           'to' => 'required',
           'from' => 'required'
        ]);
        $message = Message::create($validated);

        //이벤트를 MessageSent.php // counstruct 메소드에 보냄
        MessageSent::dispatch($message);
//        dd(request()->all());
        return response()->json([
            'message' => $message->load('from')
        ],201);
    }
}
