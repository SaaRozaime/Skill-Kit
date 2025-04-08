<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class WriteAssessController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $messages = Message::where('to_user_id', $user->id)
            ->with(['sender'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('writeassess', compact('messages'));
    }
} 