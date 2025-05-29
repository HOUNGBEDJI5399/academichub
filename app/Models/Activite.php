<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{

    protected $table = 'activite';
    

    protected $fillable = [
        'title',
        'domaine',
        'jour_heur',
        'description',
        'user_id',

    ];
    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
}
