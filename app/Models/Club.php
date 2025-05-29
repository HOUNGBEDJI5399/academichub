<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model

{

    protected $table = 'club';
    
    protected $fillable=[

        'firstname',
        'lastname',
        'clube',
        'année',
        'user_id',

    ];


    public function user(){

        return $this->belongsTo(User::class  , 'user_id');

      }
}
