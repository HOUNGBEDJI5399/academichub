<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presencel2;
use App\Models\User;


class AdminPresencel2Controller extends Controller
{



       public function adminpresencel2page()
{
    $presencesl2 = Presencel2::with('etudiant')->get(); 

    $etudiants = User::where('role', 'etudiant')
        ->where('niveau', 'L2')
        ->get();

    return view('admindashboard.presencel2', compact('presencesl2', 'etudiants'));
}




   public function destroyl2(Presencel2 $presencel2){

        $presencel2->delete();

      return redirect()->back()->with('success', 'feuille presence supprimé avec succès');

    }










    //
}
