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
        'paye',
    ];
}
