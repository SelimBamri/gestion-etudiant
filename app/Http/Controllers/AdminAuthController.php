<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use App\Models\Admin; 
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }
        return back()->withErrors(['login' => "L'utilisateur demandé n'existe pas."]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }

}
