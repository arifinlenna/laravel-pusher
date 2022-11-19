<?php

namespace App\Http\Controllers;

use App\Events\sendMessage;
use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function chat()
    {
        return view('chat');
    }

    public function message()
    {
        return Messages::with('user')->get();
    }

    public function messageStore(Request $request)
    {
        $user = Auth::user();

        return $request->all();
        $messages = $user->Message()->create([
            'message'   => $request->message
        ]);

        broadcast(new sendMessage($user, $messages))->toOthers();

        return 'message sent';
    }
}
