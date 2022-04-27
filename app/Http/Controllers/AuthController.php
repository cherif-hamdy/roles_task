<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function doRegister(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = User::create(array_merge($data, ['password' => bcrypt($data['password'])]));

        Auth::login($user);

        return redirect()->route('dashboard')->with('message' , "Welcome Mr {$user->name}");
    }

    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $data = $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $data['email'])->first();
        if (!$user)
        {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
        $hashed_password = Hash::check($data['password'], $user->password);
        if (!$hashed_password)
        {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
        Auth::login($user);
        return redirect()->route('dashboard')->with('message', "Welcome Mr {$user->name}");
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }

    public function dashboard()
    {
        $user = auth()->user();
        $role = $user->getRoleNames()->toArray();
        return view('dashboard.index', compact('user', 'role'));
    }

}
