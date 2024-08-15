<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use App\Models\Enseignant; 
use Illuminate\Support\Facades\Validator;

class EnseignantAuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('enseignant')->attempt($credentials)) {
            return redirect()->intended('/enseignant/dashboard');
        }
        return back()->withErrors(['login' => "L'utilisateur demandé n'existe pas."]);
    }

    public function logout()
    {
        Auth::guard('enseignant')->logout();
        return redirect('/eenseignant');
    }
}
