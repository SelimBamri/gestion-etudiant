<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Etudiant;
use App\Models\Enseignant;
use App\Models\Inscription;
use App\Models\Cours;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function getAllAdmins()
    {
        $admins = Admin::all();
        return view('admin.admins', compact('admins'));
    }

    public function getDashboard()
    {
        $nbCours = Cours::count();
        $nbEtudiant = Etudiant::count();
        $nbEnseignant = Enseignant::count();
        $nbInscri = Inscription::count();
        $nbInscriY = Inscription::where('paye', true)->count();
        $nbInscriN = Inscription::where('paye', false)->count();
        $totalPrix = Inscription::sum('prix');
        $totalPrixPaye = Inscription::where('paye', true)->sum('prix');
        $totalPrixNonPaye = Inscription::where('paye', false)->sum('prix');
        return view('admin.dashboard', compact('nbEtudiant','nbCours','nbEnseignant', 'nbInscri', 'nbInscriY', 'nbInscriN', 'totalPrix', 'totalPrixPaye', 'totalPrixNonPaye'));
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

    public function getAllCours()
    {
        $cours = Cours::all();
        return view('admin.cours', compact('cours'));
    }

    public function addCours(Request $request)
    {
        try{
            $enseignant = Enseignant::where('email', $request->input('email'))->first();
            if(!$enseignant){
                return back()->withErrors(["Cet enseignant n'existe pas."]);
            }
            $cours = Cours::create([
                'nom' => $request->input('nom'),
                'description' => $request->input('description'),
                'enseignant_id' => $enseignant->id,
            ]);
            return redirect()->back()->with('success', 'Cours créé avec succès!');                
            }
        catch (\Exception $e) {
            return back()->withErrors('error', "Cet enseignant n'existe pas.");
        }
    }

    public function updateCoursForm($id)
    {
        $cours = Cours::findOrFail($id);
        return view('admin.cours_form', compact('cours'));
    }

    public function updateCours(Request $request, $id)
    {
        $cours = Cours::findOrFail($id);
        try{
            $enseignant = Enseignant::where('email', $request->input('email'))->first();
            if(!$enseignant){
                return back()->withErrors(["Cet enseignant n'existe pas."]);
            }
            $cours->nom = $request->input('cours');
            $cours->description = $request->input('description');
            $cours->enseignant_id = $enseignant->id;
            $cours->save();
            return redirect()->back()->with('success', 'Cours modifié avec succès!');                
            }
        catch (\Exception $e) {
            dd($e->getMessage());
            return back()->withErrors(["Une erreur est survenue. Réessayer plus tard"]);
        }
    }

    public function deleteCours($id)
    {
        $cours = Cours::findOrFail($id);
        $cours->delete();
        return redirect()->back()->with('success', 'Cours supprimé avec succès!');
    }

    public function getAllInscriptions()
    {
        $inscriptions = Inscription::all();
        return view('admin.inscriptions', compact('inscriptions'));
    }

    public function addInscription(Request $request)
    {
        try{
            $etudiant = Etudiant::where('email', $request->input('email'))->first();
            $existingInscription = Inscription::where('etudiant_id', $etudiant->id)
            ->where('cours_id', $request->input('cours'))
            ->first();
            if ($existingInscription) {
                return redirect()->back()->withErrors(['error' => 'Cet étudiant est déjà inscrit à ce cours.']);
            }
            $inscription = Inscription::create([
                'prix' => $request->input('prix'),
                'paye' => false,
                'etudiant_id' => $etudiant->id,
                'cours_id' => $request->input('cours'),
            ]);
            return redirect()->back()->with('success', 'Inscription créée avec succès!');                
            }
        catch (\Exception $e) {
            return redirect()->back()->withErrors('error', "Une erreur est survenue. Veuillez réessayer plus tard.");
        }
    }

    public function deleteInscription($id)
    {
        $inscription = Inscription::findOrFail($id);
        $inscription->delete();
        return redirect()->back()->with('success', 'Inscription supprimée avec succès!');
    }

    public function updateInscription($id)
    {
        $inscription = Inscription::findOrFail($id);
        $inscription->paye = !$inscription->paye;
        $inscription->save();
        return redirect()->back()->with('success', 'Inscription modifiée avec succès!');
    }
}
