<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\Usercompte;
use App\Mail\Usercomptemodify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminUserController extends Controller
{
    public function usercreatepage()
    {
        return view('admindashboard.usercreate');
    }

    public function userpage()
    {
        $users = User::all();
        return view('admindashboard.users', compact('users'));
    }

    public function useradmin(Request $request)
    {
        $data = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|unique:users',
            'role' => 'required|string',
            'niveau' => 'required|string',

          
        ]);


 
      
        $login_identifier = '';
        
        while (strlen($login_identifier) < 12) {
            $login_identifier .= rand(0, 9);
        }
        $login_identifier = substr($login_identifier, 0, 12);
        $temporary_password = Str::random(10);

    

        $Is_admin = $request->role === 'admin';
        $Is_etudiant = $request->role === 'etudiant';
        $Is_professeur = $request->role === 'professeur';

        try {    
            $user = User::create([
                'firstname' => $request->firstname,          
                'lastname' => $request->lastname,
                'login_identifier' => $login_identifier,
                'email' => $request->email,  
                'password' =>  Hash::make($temporary_password),    
                'role' => $request->role,
                'niveau' => $request->niveau,
                'Is_admin' => $Is_admin,            
                'Is_etudiant' => $Is_etudiant,
                'Is_professeur' => $Is_professeur,

            ]);


            
            Mail::to($user->email)->send(new Usercompte($user, $login_identifier, $temporary_password));

            return redirect()->route('admindashboard.users')->with('success', 'Compte utilisateur créé avec succès');

        } catch (\Exception $e) {
            return redirect()->route('admindashboard.users')->with('error', 'Erreur lors de la création du compte: ' . $e->getMessage());
        }
     
    }

    public function usereditpage(User $user)
    {
        return view('admindashboard.useredit', compact('user'));
    }

  public function updateuser(Request $request, User $user)
{
    $data = $request->validate([
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'role' => 'required|string',
        'niveau' => 'required|string',

    ]);

    $Is_admin = $request->role === 'admin';
    $Is_etudiant = $request->role === 'etudiant';
    $Is_professeur = $request->role === 'professeur';

    try {
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email, 
            'role' => $request->role,
            'niveau' => $request->niveau,
            'Is_admin' => $Is_admin,
            'Is_etudiant' => $Is_etudiant,
            'Is_professeur' => $Is_professeur,
        ]);
         Mail::to($user->email)->send(new Usercomptemodify($user));
        
        return redirect()->back()->with('success', 'Compte modifié avec succès');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Erreur lors de la modification: ' . $e->getMessage());
    }
}
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admindashboard.users')->with('success', 'Compte supprimé avec succès');
    }
}
