<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();

        // Redirect based on user role
        $role = Auth::user()->role;

        if ($role === 'admin') {
            return redirect()->route('admin.dashboard'); // Redirect admins
        }
        
        if ($role === 'employee') {
            return redirect()->route('employee.dashboard'); // Redirect employees
        }        

        abort(403, 'Unauthorized action.');
    }

    return back()->with('error', 'Invalid email or password.');
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

