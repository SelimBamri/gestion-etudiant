<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Etudiant;
use App\Models\Enseignant;
use App\Models\Absence;
use App\Models\Note;
use App\Models\Inscription;
use App\Models\Cours;

class EnseignantController extends Controller
{

    public function getAllCours()
    {
        $enseignant = Auth::guard('enseignant')->user();
        $cours = Cours::where('enseignant_id', $enseignant->id)
                  ->withCount('inscriptions')
                  ->get();
        return view('enseignant.cours', compact('cours'));
    }

    public function getCours($id)
    {
        $enseignant = Auth::guard('enseignant')->user();
    $cours = Cours::findOrFail($id);

    if ($cours->enseignant->id != $enseignant->id) {
        return back()->withErrors(['email' => "Vous n'avez pas les autorisations nécessaires."]);
    }
    $etudiants = Etudiant::select('etudiants.id', 'etudiants.nom', 'etudiants.prenom')
        ->join('inscriptions', 'inscriptions.etudiant_id', '=', 'etudiants.id')
        ->leftJoin('absences', function ($join) use ($id) {
            $join->on('absences.etudiant_id', '=', 'etudiants.id')
                 ->where('absences.cours_id', '=', $id);
        })
        ->leftJoin('notes', function ($join) use ($id) {
            $join->on('notes.etudiant_id', '=', 'etudiants.id')
                 ->where('notes.cours_id', '=', $id);
        })
        ->where('inscriptions.cours_id', $id)
        ->selectRaw('COUNT(absences.id) as absences_count, MAX(notes.note) as note')
        ->groupBy('etudiants.id', 'etudiants.nom', 'etudiants.prenom')
        ->get();
        return view('enseignant.cours-get', compact('cours', 'etudiants'));
    }

    public function addAbsence(Request $request){
        try{
            $etudiant = Etudiant::where('email', $request->input('email'))->first();
            if (!$etudiant) {
                return back()->withErrors(['email' => "Étudiant introuvable avec cet email."]);
            }
            $inscription = Inscription::where('etudiant_id', $etudiant->id)
                                  ->where('cours_id', $request->input('cours'))
                                  ->first();
        
            if (!$inscription) {
                return back()->withErrors(['cours' => "Cet étudiant n'est pas inscrit dans ce cours."]);
            }
            $absence = Absence::create([
                'etudiant_id' => $etudiant->id,
                'cours_id' => $request->input('cours'),
                'date'  => $request->input('d')
            ]);
            return redirect()->back()->with('success', 'Absence créée aves succès!');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => "Une erreur est survenue. Veuillez réessayer."]);
        } 
    }

    public function getAllAbsences()
    {
        $enseignant = Auth::guard('enseignant')->user();
        $absences = Absence::whereHas('cours', function ($query) use ($enseignant) {
            $query->where('enseignant_id', $enseignant->id);
        })->with(['cours', 'etudiant'])->get();
        return view('enseignant.absences', compact('absences'));
    }

    public function addNote(Request $request){
        try{
            $etudiant = Etudiant::where('email', $request->input('email'))->first();
            if (!$etudiant) {
                return back()->withErrors(['email' => "Étudiant introuvable avec cet email."]);
            }
            $inscription = Inscription::where('etudiant_id', $etudiant->id)
                                  ->where('cours_id', $request->input('cours'))
                                  ->first();
        
            if (!$inscription) {
                return back()->withErrors(['cours' => "Cet étudiant n'est pas inscrit dans ce cours."]);
            }
            $existingNote = Note::where('etudiant_id', $etudiant->id)
            ->where('cours_id', $request->input('cours'))
            ->first();
            if ($existingNote) {
                return redirect()->back()->withErrors(['error' => 'Une note existe déjà pour cet étudiant et ce cours.']);
            }
            $note = Note::create([
                'etudiant_id' => $etudiant->id,
                'cours_id' => $request->input('cours'),
                'note'  => $request->input('note')
            ]);
            return redirect()->back()->with('success', 'Note ajoutée aves succès!');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => "Une erreur est survenue. Veuillez réessayer."]);
        } 
    }

    public function getAllNotes()
    {
        $enseignant = Auth::guard('enseignant')->user();
        $notes = Note::whereHas('cours', function ($query) use ($enseignant) {
            $query->where('enseignant_id', $enseignant->id);
        })->with(['cours', 'etudiant'])->get();
        return view('enseignant.notes', compact('notes'));
    }

    public function deleteNote($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();
        return redirect()->back()->with('success', 'Note supprimée avec succès!');
    }

    public function updateNote($id, Request $request)
    {
        $note = Note::findOrFail($id);
        try{
            $etudiant = Etudiant::where('email', $request->input('email'))->first();
            if (!$etudiant) {
                return back()->withErrors(['email' => "Étudiant introuvable avec cet email."]);
            }
            $note -> note = $request->input('note');
            $note -> cours_id = $request->input('cours');
            $note -> etudiant_id = $etudiant->id;
            $note -> save();
            return redirect()->back()->with('success', 'Note ajoutée aves succès!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->withErrors(['email' => "Une erreur est survenue. Veuillez réessayer."]);
        }
    }

    public function updateNoteForm($id)
    {
        $note = Note::findOrFail($id);
        return view('enseignant.note_form', compact('note'));
    }

}
