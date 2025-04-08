<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|confirmed',
                'role' => 'required|in:student,lecturer,admin',
                'course' => 'required_if:role,student|nullable|in:Midwifery,Cardiovascular Technology,Nursing,Paramedic,Public Health,Dental Hygiene'
            ]);

            // Create the user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'course' => $request->role === 'student' ? $request->course : null
            ]);

            // Log successful creation
            Log::info('User created successfully:', ['id' => $user->id, 'role' => $user->role]);

            // Store success message in session
            Session::flash('success', 'Registration successful! Please login.');

            // Redirect to login page
            return redirect()->route('login');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            return back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            // Log any other errors
            Log::error('Registration error:', [
                'message' => $e->getMessage(),
                'role' => $request->role
            ]);

            return back()
                ->withInput()
                ->withErrors(['error' => 'Registration failed. Please try again.']);
        }
    }
} 