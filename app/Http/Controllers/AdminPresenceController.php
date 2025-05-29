<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presence;
use App\Models\User;

class AdminPresenceController extends Controller
{

     public function adminpresencepage()
{
    $presences = Presence::with('etudiant')->get(); 

    $etudiants = User::where('role', 'etudiant')
        ->where('niveau', 'L1')
        ->get();

    return view('admindashboard.presence', compact('presences', 'etudiants'));
}




   public function destroy(Presence $presence){

        $presence->delete();

      return redirect()->back()->with('success', 'feuille présence supprimé avec succès');

    }


}
