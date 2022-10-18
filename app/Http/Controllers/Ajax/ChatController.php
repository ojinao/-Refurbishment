<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users\Message;

class ChatController extends Controller
{
    public function index()
    { // 新着順にメッセージ一覧を取得

        return Message::orderBy('id', 'desc')->get();
    }

    public function create(Request $request)
    { // メッセージを登録

        Message::create([
            'body' => $request->message
        ]);
    }
}
