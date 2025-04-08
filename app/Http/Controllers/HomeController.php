<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $messages = Message::where('to_user_id', Auth::id())
            ->with(['sender'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        $user = Auth::user();
        $users = User::where('id', '!=', Auth::id())->get();
        
        return view('home', compact('messages', 'user', 'users'));
    }
}