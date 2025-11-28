<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view('admin.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // For demo: hardcoded admin credentials
        if ($request->username === 'admin' && $request->password === 'password123') {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.products.index');
        }

        return back()->withErrors(['Invalid credentials']);
    }

    // Logout
    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    }
}
