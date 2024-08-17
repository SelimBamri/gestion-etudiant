<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Etudiant extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'date_de_naissance',
        'adresse',
        'email',
        'telephone',
        'password',
    ];

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
