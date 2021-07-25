<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends \App\Http\Controllers\Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }  
      
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard.index')->withSuccess('Signed in');
        }
  
        return redirect()->route('admin.auth.login.get')->withErrors('Tài khoản hoặc mật khẩu không chính xác!');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
  
        return redirect()->route('admin.auth.login.get');
    }
}