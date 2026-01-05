<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('customer.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        return $this->authenticate($request);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials,$request->boolean('remember'))) {
            $request->session()->regenerate();
            Auth::guard('customer')->user()->update(
                ['is_online' => true,
                 'last_seen_at' => now()
                ]);
            // Authentication passed...
            return redirect()->intended(route('customer.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        auth()->guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('customer.login');
    }

    public function dashboard()
    {
        $customers = \App\Models\Customer::select('name','is_online')->get();
        return view('customer.dashboard', compact('customers'));
    }
}
