<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Etudiant;
use App\Models\Enseignant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function getAllAdmins()
    {
        $admins = Admin::all();
        return view('admin.admins', compact('admins'));
    }

    public function addAdmin(Request $request)
    {
        try {
            $admin = Admin::create([
                'login' => $request->input('login'),
                'password' => Hash::make($request->input('password')),
            ]);
            return redirect()->back()->with('success', 'Administrateur créé aves succès!');
        } catch (\Exception $e) {
            return back()->withErrors(['login' => "Le login est déjà utilisé."]);
        }
    }

    public function deleteAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->back()->with('success', 'Administrateur supprimé avec succès!');
    }

    public function updateMyAccount(Request $request)
    {
        if($request->input('password') != $request->input('confirm-password')){
            return back()->withErrors(['login' => "Les mots de passes ne sont pas identiques."]);
        }
        try {
            $admin = Auth::guard('admin')->user(); 
            $admin->login = $request->input('login');
            if ($request->input('password')) {
                $admin->password = Hash::make($request->input('password'));
            }
            $admin->save();
            return redirect()->back()->with('success', 'Administrateur modifié avec succès!');
        } catch (\Exception $e) {
            return back()->withErrors(['login' => "Le login est déjà utilisé."]);
        }
    }

    public function deleteMyAccount()
    {
        $admin = Auth::guard('admin')->user();
        Auth::guard('admin')->logout();
        $admin->delete();
        return redirect('/admin');
    }

}
