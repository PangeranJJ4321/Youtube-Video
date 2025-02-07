<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class admin2Controller extends Controller
{
    public function index()
    {
        $admin = Auth::user();
        $users = User::where('role', '!=', 'admin')->get();
        return view('dasboard.admin', compact('admin', 'users'));
    }

    public function editAdmin(Request $request)
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
    
            return redirect('/admin')->with('success', 'Data berhasil diedit');
        } catch (\Exception $e) {
            return redirect('/admin')->with('fail', $e->getMessage());
        }
    }

    public function storeUser(Request $request)
    {
        // Validasi input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4|max:8',
        ]);
    
        try {
            // Membuat instance baru untuk pengguna
            $user_baru = new User();
            $user_baru->name = $request->name;
            $user_baru->email = $request->email;
            $user_baru->password = Hash::make($request->password); // Enkripsi password
            $user_baru->save(); // Simpan pengguna baru ke database
    
            // Mengarahkan kembali ke halaman admin dengan pesan sukses
            return redirect('/admin')->with('success', 'User berhasil didaftarkan');
        } catch (\Exception $e) {
            // Menangani error dan memberikan pesan kesalahan
            return redirect('/admin')->with('fail', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function delete(Request $request) {
        try {
            User::where('id', $request->id) ->delete();
            return redirect('/admin') ->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            return redirect('/admin') ->with('fail', $e->getMessage());
        }
    }
    
}
