<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'enseignant_id'
    ];

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }
    
    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

}
