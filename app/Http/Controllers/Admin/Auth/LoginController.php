<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
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
     

        if (Auth::guard('admin')->attempt($credentials,$request->boolean('remember'))) {
            $request->session()->regenerate();
            
            Auth::guard('admin')->user()->update(
                ['is_online' => true,
                 'last_seen_at' => now()
                ]);
               
            // Authentication passed...
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        if ($admin) {
            $admin->update(['is_online' => false, 'last_seen_at' => now()]);
        }
        auth()->guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $admins = Admin::select('name','is_online')->get();
        $customers = Customer::select('name','is_online')->get();
        return view('admin.dashboard', compact('admins', 'customers'));
    }

}
