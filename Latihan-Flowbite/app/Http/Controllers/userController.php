<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{

    public function index() {
        $user = Auth::user();
        return view('dasboard.user', compact('user'));
    }

    public function edit(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'password' => 'nullable|string|min:4|max:8',
        ]);
    
        try {
            // Update data pengguna
            $update_user = User::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : User::find($request->id)->password, // Hash hanya jika password diubah
            ]);
    
            return redirect('/user')->with('success', 'Data berhasil diedit');
        } catch (\Exception $e) {
            return redirect('/user')->with('fail', $e->getMessage());
        }
    }
    


}

