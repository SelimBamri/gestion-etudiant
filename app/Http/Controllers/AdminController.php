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

    public function getAllEnseignants()
    {
        $enseignants = Enseignant::all();
        return view('admin.enseignants', compact('enseignants'));
    }

    public function addEnseignant(Request $request)
    {
        try {
            $enseignant = Enseignant::create([
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'adresse' => $request->input('adresse'),
                'telephone' => $request->input('telephone'),
                'date_de_naissance' => $request->input('dan')
            ]);
            return redirect()->back()->with('success', 'Enseignant créé aves succès!');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => "Cette adresse mail est déjà utilisée."]);
        }
    }

    public function deleteEnseignant($id)
    {
        $enseignant = Enseignant::findOrFail($id);
        $enseignant->delete();
        return redirect()->back()->with('success', 'Enseignant supprimé avec succès!');
    }

    public function updateEnseignantPost(Request $request, $id)
    {
        if($request->input('password') != $request->input('confirm-password')){
            return back()->withErrors(['login' => "Les mots de passes ne sont pas identiques."]);
        }
        try {
            $enseignant = Enseignant::findOrFail($id);
            $enseignant->email = $request->input('email');
            $enseignant->nom = $request->input('nom');
            $enseignant->prenom = $request->input('prenom');
            $enseignant->adresse = $request->input('adresse');
            $enseignant->telephone = $request->input('telephone');
            $enseignant->date_de_naissance = $request->input('dan');
            if ($request->input('password')) {
                $enseignant->password = Hash::make($request->input('password'));
            }
            $enseignant->save();
            return redirect()->back()->with('success', 'Enseignant modifié avec succès!');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => "Cette adresse mail est déjà utilisée."]);
        }
    }

    public function updateEnseignant($id)
    {
        $enseignant = Enseignant::findOrFail($id);
        return view('admin.update_enseignant', compact('enseignant'));
    }


    public function getAllEtudiants()
    {
        $etudiants = Etudiant::all();
        return view('admin.etudiants', compact('etudiants'));
    }

    public function addEtudiant(Request $request)
    {
        try {
            $etudiant = Etudiant::create([
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'adresse' => $request->input('adresse'),
                'telephone' => $request->input('telephone'),
                'date_de_naissance' => $request->input('dan')
            ]);
            return redirect()->back()->with('success', 'Étudiant créé aves succès!');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => "Cette adresse mail est déjà utilisée."]);
        }
    }

    public function deleteEtudiant($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();
        return redirect()->back()->with('success', 'Étudiant supprimé avec succès!');
    }

    public function updateEtudiantPost(Request $request, $id)
    {
        if($request->input('password') != $request->input('confirm-password')){
            return back()->withErrors(['login' => "Les mots de passes ne sont pas identiques."]);
        }
        try {
            $etudiant = Etudiant::findOrFail($id);
            $etudiant->email = $request->input('email');
            $etudiant->nom = $request->input('nom');
            $etudiant->prenom = $request->input('prenom');
            $etudiant->adresse = $request->input('adresse');
            $etudiant->telephone = $request->input('telephone');
            $etudiant->date_de_naissance = $request->input('dan');
            if ($request->input('password')) {
                $etudiant->password = Hash::make($request->input('password'));
            }
            $etudiant->save();
            return redirect()->back()->with('success', 'Étudiant modifié avec succès!');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => "Cette adresse mail est déjà utilisée."]);
        }
    }

    public function updateEtudiant($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('admin.update_etudiant', compact('etudiant'));
    }

}
