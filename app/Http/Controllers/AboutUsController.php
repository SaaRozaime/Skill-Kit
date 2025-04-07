<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $messages = Message::where('to_user_id', auth()->id())
            ->with('sender')
            ->orderBy('created_at', 'desc')
            ->get();
        
        $user = auth()->user();

        return view('aboutus', compact('messages', 'user'));
    }
} 