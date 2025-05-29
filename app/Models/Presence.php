<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $table='presence';


    protected $fillable= [

        'nom_cour',
        'niveau',
        'heure_cour',
        'type_presence',
        'user_id',
        'etudiant_id',
        
            ];

    public function etudiant(){

        return $this->belongsTo(User::class  ,'etudiant_id');
    }

    
 



    public function getNomEtudiantAttribute()
    {
        if ($this->etudiant) {
            return $this->etudiant->firstname . ' ' . $this->etudiant->lastname;
        }
        return 'Étudiant inconnu';
    }
}

