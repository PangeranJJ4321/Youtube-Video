<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function store(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $request->session()->regenerate();
            $role = Auth::user()->role;

            if($role === 'user'){

                return redirect('/user')->with('success', 'Successfully logged in');
            } else {

                return redirect('/admin')->with('success', 'Successfully logged in');
            }
            
             
        } else {
            return back()->with('fail', 'Login failed, not valid credentials');
        }
    }
}