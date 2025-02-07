<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function index() {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:4|max:8',
        ]);

        try {
            $user_baru = new User();
            $user_baru->name = $request->name;
            $user_baru->email = $request->email;
            $user_baru->password = Hash::make($request->password);
            $user_baru->save();

            Auth::login($user_baru);

            $request->session()->regenerate();
            return redirect('/user')->with('success', 'Successfully registered');
        } catch (\Exception $e) {
            return redirect('register')->with('fail', $e->getMessage());
        }
    }
}
