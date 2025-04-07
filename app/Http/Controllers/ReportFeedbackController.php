<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ReportFeedbackController extends Controller
{
    public function index()
    {
        $messages = Message::where('to_user_id', auth()->id())
            ->with('sender')
            ->orderBy('created_at', 'desc')
            ->get();

        $user = auth()->user();
        
        return view('reportfeedback', compact('messages', 'user'));
    }
} 