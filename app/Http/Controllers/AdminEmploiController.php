<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emploi;
use App\Models\User;
use App\Mail\Useremploi;
use App\Mail\Useremploimodify;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AdminEmploiController extends Controller
{


      public function emploicreatepage() {
        return view('admindashboard.emploicreate');
    }

    

    public function emploipage() {

        $emplois = Emploi::all();
        
        return view('admindashboard.emploi', compact('emplois'));
    }




    public function validateemploi(Request $request)
    {
        $data = $request->validate([
            'annee' => 'required|string',
            'semaine' => 'required|string',
            'classe' => 'required|string',

           
        ]);

        
           $emploi = Emploi::create([

            'annee'=> $request->annee,
            'semaine'=> $request->semaine,
            'classe'=> $request->classe,
            
            
            'lundi_8h' => $request->lundi_8h,
            'lundi_9h' => $request->lundi_9h,
            'lundi_10h' => $request->lundi_10h,
            'lundi_11h' => $request->lundi_11h,
            'lundi_12h' => $request->lundi_12h,
            'lundi_13h' => $request->lundi_13h,
            'lundi_14h' => $request->lundi_14h,
            'lundi_15h' => $request->lundi_15h,
            'lundi_16h' => $request->lundi_16h,

            // Mardi
            'mardi_8h' => $request->mardi_8h,
            'mardi_9h' => $request->mardi_9h,
            'mardi_10h' => $request->mardi_10h,
            'mardi_11h' => $request->mardi_11h,
            'mardi_12h' => $request->mardi_12h,
            'mardi_13h' => $request->mardi_13h,
            'mardi_14h' => $request->mardi_14h,
            'mardi_15h' => $request->mardi_15h,
            'mardi_16h' => $request->mardi_16h,

            // Mercredi
            'mercredi_8h' => $request->mercredi_8h,
            'mercredi_9h' => $request->mercredi_9h,
            'mercredi_10h' => $request->mercredi_10h,
            'mercredi_11h' => $request->mercredi_11h,
            'mercredi_12h' => $request->mercredi_12h,
            'mercredi_13h' => $request->mercredi_13h,
            'mercredi_14h' => $request->mercredi_14h,
            'mercredi_15h' => $request->mercredi_15h,
            'mercredi_16h' => $request->mercredi_16h,

            // Jeudi
            'jeudi_8h' => $request->jeudi_8h,
            'jeudi_9h' => $request->jeudi_9h,
            'jeudi_10h' => $request->jeudi_10h,
            'jeudi_11h' => $request->jeudi_11h,
            'jeudi_12h' => $request->jeudi_12h,
            'jeudi_13h' => $request->jeudi_13h,
            'jeudi_14h' => $request->jeudi_14h,
            'jeudi_15h' => $request->jeudi_15h,
            'jeudi_16h' => $request->jeudi_16h,

            // Vendredi
            'vendredi_8h' => $request->vendredi_8h,
            'vendredi_9h' => $request->vendredi_9h,
            'vendredi_10h' => $request->vendredi_10h,
            'vendredi_11h' => $request->vendredi_11h,
            'vendredi_12h' => $request->vendredi_12h,
            'vendredi_13h' => $request->vendredi_13h,
            'vendredi_14h' => $request->vendredi_14h,
            'vendredi_15h' => $request->vendredi_15h,
            'vendredi_16h' => $request->vendredi_16h,
            'user_id' => auth()->id(),

               

               
            ]);
            
        

        $etudiants = User::where('Is_etudiant', true)->get();


        foreach ($etudiants as $etudiant) {
            
            Mail::to($etudiant->email)->send(new Useremploi ($etudiant , $emploi));
        }
        
        return redirect()->route('admindashboard.emploi')->with('success', 'emploi ajouté pour les jours sélectionnés.');
    }

   



    public function emploieditpage(Emploi $emploi){

        return view('admindashboard.emploiedit', compact('emploi'));
    }



    public function update(Request $request, Emploi $emploi)
    {
      $data = $request->validate([
        'annne' => 'required|string',
            'semaine' => 'required|string',
            'classe' => 'required|string',
           
           
           
        ]);

        $emploi->update([

            
            'lundi_8h' => $request->lundi_8h,
            'lundi_9h' => $request->lundi_9h,
            'lundi_10h' => $request->lundi_10h,
            'lundi_11h' => $request->lundi_11h,
            'lundi_12h' => $request->lundi_12h,
            'lundi_13h' => $request->lundi_13h,
            'lundi_14h' => $request->lundi_14h,
            'lundi_15h' => $request->lundi_15h,
            'lundi_16h' => $request->lundi_16h,

            // Mardi
            'mardi_8h' => $request->mardi_8h,
            'mardi_9h' => $request->mardi_9h,
            'mardi_10h' => $request->mardi_10h,
            'mardi_11h' => $request->mardi_11h,
            'mardi_12h' => $request->mardi_12h,
            'mardi_13h' => $request->mardi_13h,
            'mardi_14h' => $request->mardi_14h,
            'mardi_15h' => $request->mardi_15h,
            'mardi_16h' => $request->mardi_16h,

            // Mercredi
            'mercredi_8h' => $request->mercredi_8h,
            'mercredi_9h' => $request->mercredi_9h,
            'mercredi_10h' => $request->mercredi_10h,
            'mercredi_11h' => $request->mercredi_11h,
            'mercredi_12h' => $request->mercredi_12h,
            'mercredi_13h' => $request->mercredi_13h,
            'mercredi_14h' => $request->mercredi_14h,
            'mercredi_15h' => $request->mercredi_15h,
            'mercredi_16h' => $request->mercredi_16h,

            // Jeudi
            'jeudi_8h' => $request->jeudi_8h,
            'jeudi_9h' => $request->jeudi_9h,
            'jeudi_10h' => $request->jeudi_10h,
            'jeudi_11h' => $request->jeudi_11h,
            'jeudi_12h' => $request->jeudi_12h,
            'jeudi_13h' => $request->jeudi_13h,
            'jeudi_14h' => $request->jeudi_14h,
            'jeudi_15h' => $request->jeudi_15h,
            'jeudi_16h' => $request->jeudi_16h,

            // Vendredi
            'vendredi_8h' => $request->vendredi_8h,
            'vendredi_9h' => $request->vendredi_9h,
            'vendredi_10h' => $request->vendredi_10h,
            'vendredi_11h' => $request->vendredi_11h,
            'vendredi_12h' => $request->vendredi_12h,
            'vendredi_13h' => $request->vendredi_13h,
            'vendredi_14h' => $request->vendredi_14h,
            'vendredi_15h' => $request->vendredi_15h,
            'vendredi_16h' => $request->vendredi_16h,

            'user_id' => auth()->id(),
 
        ]);

        $etudiants = User::where('Is_etudiant', true)->get();

        foreach ($etudiants as $etudiant) {
            Mail::to($etudiant->email)->send(new Useremploimodify ($etudiant ,$emploi));
        }
        

        return redirect()->route('admindashboard.emploi')->with('success', 'Emploi du temps mis à jour.');
    }

    public function destroy( Emploi $emploi){

        $emploi->delete();
        return redirect()->back()->with('success' , ' emploi supprimer avec succèe' );
}

}






