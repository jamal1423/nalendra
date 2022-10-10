<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function main_panel_login()
    {
        return view('panel.page.login');
    }

    public function authenticate_admin(Request $request)
    {
        $credentials = $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        
        if (Auth::attempt($credentials)) {
            if (Auth::check()) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }else{
                return redirect()->intended('/loginpanel');
            }
        }

        return back()->with('loginError', 'Wrong username or password, please try again!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/loginpanel');
    }
}
