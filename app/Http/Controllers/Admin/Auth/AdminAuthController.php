<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function getLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('dashboard.index');
        }

        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->boolean('remember');

        if (! Auth::guard('admin')->attempt($credentials, $remember)) {
            return back()
                ->withInput($request->only('email', 'remember'))
                ->with('error', 'Whoops! Invalid credentials.');
        }

        $admin = Auth::guard('admin')->user();

        if (! $admin->is_admin) {
            Auth::guard('admin')->logout();

            return back()
                ->withInput($request->only('email'))
                ->with('error', 'You do not have permission to access the admin area.');
        }

        $request->session()->regenerate();

        return redirect()
            ->intended(route('dashboard.index'))
            ->with('success', 'You are logged in successfully.');
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();

        // Only forget the admin guard state so a simultaneous public-user
        // session (the "web" guard) is not affected.
        $request->session()->regenerateToken();

        return redirect()
            ->route('getLogin')
            ->with('success', 'You have logged out successfully.');
    }
}
