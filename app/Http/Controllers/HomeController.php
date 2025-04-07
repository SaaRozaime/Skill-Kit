<?php

namespace App\Http\Controllers;

use App\Models\Message;
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
        
        return view('home', compact('messages', 'user'));
    }
} 