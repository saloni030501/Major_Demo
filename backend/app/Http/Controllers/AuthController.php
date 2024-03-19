<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // Check if the user is already authenticated
        if (auth()->check() && auth()->user()->role === 'admin') {
            // If the user is an admin and already logged in, redirect to the dashboard
            return redirect('/dashboard');
        }

        // If not authenticated or not an admin, show the login form

        return view('login');
    }

    public function index()
    {
        return view('admin.index');
    }
    public function showPendingRequests()
    {
        $pendingRequests = User::where('is_approved', 0)->get();
        return view('admin.index', ['pendingRequests' => $pendingRequests]);
    }

    public function acceptRequest(User $user)
    {
        $user->update(['is_approved' => true]);
        return redirect()->back()->with('status', 'User request accepted successfully.');
    }

    public function rejectRequest(User $user)
    {
        $user->delete();
        return redirect()->back()->with('status', 'User request rejected successfully.');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('index'); // Redirect to admin dashboard

        } else {
            // Authentication failed
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password']);
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
