<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use session;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginForm;
use App\Http\Requests\RegisterForm;
use App\User;
use Hash;

class LoginController extends Controller
{
    public function login(LoginForm $request)
    {
        $user = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if ($user) {
            if (Auth::user()->rule == 2) {
                return redirect('/home');
            } else {
                return redirect('/admin');
            }
        } else {
            return view('auth.login');
        }
    }
    
    public function checkLogin()
    {
        if (Auth::check()) {
            return redirect('/home');
        } else {
            return view('auth.login');
        }
    }
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect()->back();
    }
    public function userRegister(RegisterForm $request)
    {
        try {
            $user = new User;
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            session()->flash('success', trans('view.register_success'));
            return redirect('/login');
        } catch (\Exception $e) {
            session()->flash('fail', trans('view.register_fail'));
            return redirect('/register');
        }
    }
    public function checkUserRegister()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
        return view('auth.register');
    }
}
