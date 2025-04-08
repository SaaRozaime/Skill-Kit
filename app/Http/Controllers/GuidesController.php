<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class GuidesController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $messages = Message::where('to_user_id', $user->id)
            ->with(['sender'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('guides', compact('messages'));
    }
} 