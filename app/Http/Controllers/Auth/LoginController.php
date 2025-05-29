<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
     public function redirectTo(){
        if(Auth()->user()->role == "admin" ){
            return route('admindashboard.index');

        }
        if(Auth()->user()->role == "etudiant" ){
           return route('etudiantdashboard.acceuil');

        }

        if(Auth()->user()->role == "professeur" ){
            return route('professeurdashboard.acceuil');

        }
        return route('login');


      }
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

     /**
     * Personnaliser la méthode de validation de la connexion.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'login_identifier' => 'required|string|exists:users,login_identifier', // Validation de login_identifier
            'password' => 'required|string|min:8', // Validation du mot de passe
        ]);
    }

    /**
     * Définir l'username utilisé pour la connexion.
     *
     * @return string
     */
    public function username()
    {
        return 'login_identifier'; // Utilisation de login_identifier comme champ pour la connexion
    }


}
