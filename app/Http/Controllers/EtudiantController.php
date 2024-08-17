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


class EtudiantController extends Controller
{
    public function getAllCours()
    {
        $etudiant = Auth::guard('etudiant')->user();
        $cours = Cours::join('inscriptions', 'cours.id', '=', 'inscriptions.cours_id')
        ->where('inscriptions.etudiant_id', $etudiant->id)
        ->select('cours.*')
        ->get();
        return view('etudiant.cours', compact('cours'));
    }

    public function getAllAbsences()
    {
        $etudiant = Auth::guard('etudiant')->user();
        $absences = Absence::where('etudiant_id', $etudiant->id)->get();
        return view('etudiant.absences', compact('absences'));
    }

    public function getAllNotes()
    {
        $etudiant = Auth::guard('etudiant')->user();
        $notes = Note::where('etudiant_id', $etudiant->id)->get();
        return view('etudiant.notes', compact('notes'));
    }
}
