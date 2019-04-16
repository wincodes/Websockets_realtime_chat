<?php

namespace App\Http\Controllers;
use App\Messages;
use App\Users;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

use Illuminate\Http\Request;

class ChatsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        return view('chats');
    }

    public function fetch()
    {
        return Messages::with('user')->get();
    }

    public function send(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'messages' => $request->messages
        ]);

        broadcast(new MessageSent($message->load('user')))->toOthers();

        return ['status' => 'success'];
    }
}
