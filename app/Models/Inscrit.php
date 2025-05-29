<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscrit extends Model 
{
    use HasFactory, Notifiable, SoftDeletes;
    
    protected $table = 'inscrit';
    
    protected $fillable = [
        'nom',
        'prenom',
        'niveau',
        'email',
        'matricule',
        'annee',
        'tel',
    ];
        
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}




  