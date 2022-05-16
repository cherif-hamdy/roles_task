<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showAdminLogin()
    {
        return view('auth.admin.login');
    }

    public function adminLogin(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (auth()->guard('admin')->attempt($data))
        {
            return redirect()->intended('/admin');
        }

        return back()->with('error', 'Invalid Credentials');
    }

    public function adminDashboard()
    {
        $user = \auth()->guard('admin')->user();
        return view('dashboard.index', compact('user'));
    }

    public function logout()
    {
        session()->flush();
        \auth()->guard('admin')->logout();
        return redirect()->route('login');
    }
}
