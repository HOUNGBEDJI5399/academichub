<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{

    protected $table = 'matiere';

    protected $fillable=[
        'nom_prof',
        'nom_matiere',
        'niveau',
        'ue',
       'user_id',

    ];

    public function user(){

        return $this->belongsTo(User::class  , 'user_id');

      }
}
