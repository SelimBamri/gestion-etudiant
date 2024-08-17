<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use App\Models\Etudiant; 
use Illuminate\Support\Facades\Validator;

class EtudiantAuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('etudiant')->attempt($credentials)) {
            return redirect()->intended('/etudiant/cours');
        }
        return back()->withErrors(['login' => "L'utilisateur demandé n'existe pas."]);
    }

    public function logout()
    {
        Auth::guard('etudiant')->logout();
        return redirect('/');
    }
}
