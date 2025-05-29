<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presencel3;
use App\Models\User;


class AdminPresencel3Controller extends Controller
{


       public function adminpresencel3page()
{
    $presencesl3 = Presencel3::with('etudiant')->get(); 

    $etudiants = User::where('role', 'etudiant')
        ->where('niveau', 'L3')
        ->get();

    return view('admindashboard.presencel3', compact('presencesl3', 'etudiants'));
}



 public function destroyl2(Presencel3 $presencel3){

        $presencel3->delete();

      return redirect()->back()->with('success', 'feuille presence supprimer supprimé avec succès');

    }









    //
}
