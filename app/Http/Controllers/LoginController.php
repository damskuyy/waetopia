<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth_fe.login', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('pelanggan')->attempt($credentials)) {
            // Periksa apakah user memiliki data di tabel pelanggans
            $user = Auth::guard('pelanggan')->user();
            $pelanggan = Pelanggan::where('id_user', $user->id)->first();

            if (!$pelanggan) {
                Auth::guard('pelanggan')->logout();
                return back()->withErrors(['email' => 'Akun ini tidak terdaftar sebagai pelanggan.']);
            }

            // Redirect ke home.index
            return redirect()->route('home.index')->with('success', 'Berhasil login!');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout()
    {
        Auth::guard('pelanggan')->logout();
        return redirect()->route('auth_fe.login')->with('success', 'Berhasil logout.');
    }
}
