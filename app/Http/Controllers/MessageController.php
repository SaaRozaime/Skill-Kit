<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $messages = Message::where('to_user_id', $user->id)
            ->with(['sender'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        $users = User::where('id', '!=', $user->id)->get();

        return view('message', compact('messages', 'user', 'users'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'recipient' => 'required',
            'content' => 'required|string|max:1000',
        ]);

        $sender = Auth::user();
        
        // Check if recipient is an email or ID
        if (filter_var($request->recipient, FILTER_VALIDATE_EMAIL)) {
            $recipient = User::where('email', $request->recipient)->firstOrFail();
        } else {
            $recipient = User::findOrFail($request->recipient);
        }

        Message::create([
            'from_user_id' => $sender->id,
            'to_user_id' => $recipient->id,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    public function getUnreadCount()
    {
        $count = Message::where('to_user_id', auth()->id())
            ->where('is_read', false)
            ->count();

        return response()->json(['count' => $count]);
    }

    public function markAsRead($id)
    {
        $message = Message::findOrFail($id);
        
        // Check if the message belongs to the current user
        if ($message->to_user_id !== auth()->id()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        $message->is_read = true;
        $message->save();

        return response()->json(['success' => true]);
    }

    public function delete($id)
    {
        $message = Message::findOrFail($id);
        
        // Check if the message belongs to the current user
        if ($message->to_user_id !== auth()->id()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        $message->delete();

        return response()->json(['success' => true]);
    }
} 