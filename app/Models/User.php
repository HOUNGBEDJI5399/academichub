<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes; 

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable , SoftDeletes;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'firstname',                             
        'lastname',
        'email',
        'role',
        'niveau',
        'password',
        'login_identifier',
        'Is_admin',
        'Is_professeur',
        'Is_etudiant'
       
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }




    
    public function clubs(){

        return $this->hasMany(CLUB::class ,'user_id' );

      }



      public function emploi(){

        return $this->hasMany(Emploi::class , 'user_id' );

      }


      
      public function annonce(){

        return $this->hasMany(Annonce::class , 'user_id' );

      }

      
      public function activite(){

        return $this->hasMany(Activite::class , 'user_id' );

      }

      
      public function ue(){

        return $this->hasMany(Ue::class , 'user_id' );

      }




      public function cour(){

        return $this->hasMany(Cour::class , 'user_id' );

      }


      


      
      public function matiere(){

        return $this->hasMany(Matiere::class , 'user_id' );

      }

       
      public function presence(){

        return $this->hasMany(Presence::class , 'user_id');

      }

          public function presencel2(){

        return $this->hasMany(Presencel2::class  , 'user_id');

      }
          public function presencel3(){

        return $this->hasMany(Presencel3::class , 'user_id' );

      }

           public function inscrit(){

        return $this->hasMany(Inscrit::class , 'user_id' );

      }




}
