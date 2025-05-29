<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{

    protected $table = 'annonce';

    protected $fillable=[
        'title',
        'description',
          'user_id',
        
    ];

    public function user(){
     
        $this->belongsTo(User::class ,  'user_id');

    }
}
