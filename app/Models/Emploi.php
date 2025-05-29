<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    
     protected $table='emploi';


    
    protected $fillable = [
        'annee',
        'classe',
        'semaine',

        'lundi_8h',
        'lundi_9h',
        'lundi_10h',
        'lundi_11h',
        'lundi_12h',
        'lundi_13h',
        'lundi_14h',
        'lundi_15h',
        'lundi_16h',

        'mardi_8h',
        'mardi_9h',
        'mardi_10h',
        'mardi_11h',
        'mardi_12h',
        'mardi_13h',
        'mardi_14h',
        'mardi_15h',
        'mardi_16h',

        'mercredi_8h',
        'mercredi_9h',
        'mercredi_10h',
        'mercredi_11h',
        'mercredi_12h',
        'mercredi_13h',
        'mercredi_14h',
        'mercredi_15h',
        'mercredi_16h',

        
        'jeudi_8h',
        'jeudi_9h',
        'jeudi_10h',
        'jeudi_11h',
        'jeudi_12h',
        'jeudi_13h',
        'jeudi_14h',
        'jeudi_15h',
        'jeudi_16h',

    
        'vendredi_8h',
        'vendredi_9h',
        'vendredi_10h',
        'vendredi_11h',
        'vendredi_12h',
        'vendredi_13h',
        'vendredi_14h',
        'vendredi_15h',
        'vendredi_16h',
        'user_id',

    ];















    public function user(){


        return $this->belongsTo(User::class);
    }
}
