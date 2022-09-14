<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function login()
    {
        return view('login/login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        // dd($credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->with('loginError', 'Email or Password is invalid');
    }

    /* public function backup 1()
    {
        public function forgot()
        {
            return view('login/email');
        }
        public function email(Request $request)
        {
        }
        public function reset()
        {
            return view('login/reset');
        }
        public function store(Request $request)
        {
        }
    } */
    
    public function signup()
    {
        return view('login/signup');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:255',
            // 'is_administrator' => 'required'
         ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        // $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
         return redirect('login')->with('success', 'Registration successfull!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
