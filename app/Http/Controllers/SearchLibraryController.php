<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class SearchLibraryController extends Controller
{
    public function index()
    {
        $messages = Message::where('to_user_id', auth()->id())
            ->with('sender')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('searchlibrary', compact('messages'));
    }
} 