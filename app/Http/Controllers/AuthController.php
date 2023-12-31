<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function index()
    {
        return view('login');
    }

    // mengecek apakah sama seperti yang didatabase
    function login(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        $credentials = [
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == 'admin' || $user->role == 'operator') {
                return redirect('dashboard/surat')->with('_token', Session::token());
            } 
        }

        return redirect()->back()->withErrors('Terdapat kesalahan Username atau Password')->withInput()->with('_token', Session::token());
    }

    function logout()
    {
        Auth::logout();
        Session::regenerateToken();
        return redirect('/');
    }
}
