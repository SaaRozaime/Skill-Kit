<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Message;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $messages = Message::where('to_user_id', $user->id)
            ->with(['sender'])
            ->orderBy('created_at', 'desc')
            ->get();
            
        if ($user->role === 'lecturer') {
            return view('profilelec', compact('messages'));
        }
        
        return view('profile', compact('messages'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        // First check if current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => ['current_password' => ['The current password is incorrect.']]], 422);
            }
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Validate the request
        $request->validate([
            'new_password' => ['required', 'confirmed'],
        ]);

        try {
            // Update the password in the database
            $user->password = Hash::make($request->new_password);
            $user->save();

            // Log out the user
            Auth::logout();

            // Clear all session data
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Password updated successfully! Please login with your new password.',
                    'redirect' => route('login')
                ]);
            }

            return redirect()->route('login')->with('success', 'Password updated successfully! Please login with your new password.');
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Failed to update password. Please try again.'], 500);
            }
            return back()->with('error', 'Failed to update password. Please try again.');
        }
    }

    public function edit()
    {
        $user = auth()->user();
        $messages = Message::where('to_user_id', $user->id)
            ->with(['sender'])
            ->orderBy('created_at', 'desc')
            ->get();
            
        if ($user->role === 'lecturer') {
            return view('profilelec.edit', compact('messages'));
        }
        
        return view('profile.edit', compact('messages'));
    }

    public function showPasswordForm()
    {
        $user = auth()->user();
        $messages = Message::where('to_user_id', $user->id)
            ->with(['sender'])
            ->orderBy('created_at', 'desc')
            ->get();
            
        if ($user->role === 'lecturer') {
            return view('profilelec.password', compact('messages'));
        }
        
        return view('profile.password', compact('messages'));
    }
} 