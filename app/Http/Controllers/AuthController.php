<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function masuk(){
        return view('auth.masuk');
    }

    
    public function submitMasuk(Request $request)
    {
        $data = $request->only('email', 'password');
        
        if(Auth::attempt($data)){
            $request->session()->regenerate();

            $user = Auth::user()->level;
            if($user == 'admin'){
                return redirect()->route('admin.index');
            } elseif($user == 'bendahara'){
                return redirect()->route('bendahara.index');
            } elseif($user == 'pelanggan'){
                return redirect()->route('home.index');
            } elseif($user == 'pemilik'){
                return redirect()->route('owner.index');
            }
        } else {
            return redirect()->back()->with('gagal', 'Email atau password salah.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('masuk');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
