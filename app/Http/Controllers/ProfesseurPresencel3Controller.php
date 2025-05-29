<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presencel3;
use App\Models\User;
use App\Mail\Etudiantpresence;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ProfesseurPresencel3Controller extends Controller
{



    


   
    
    public function presencel3page(){

            $presencesl3 = Presencel3::with('etudiant')->get(); 

    $etudiants = User::where('role', 'etudiant')
        ->where('niveau', 'L3')
        ->get();

    return view('professeurdashboard.presencel3', compact('presencesl3', 'etudiants'));
    
    }

    
  


    public function presencel3createpage(){

                $etudiants = User::where('role', 'etudiant')

                 ->where('niveau', 'L3')
                 ->get();

                

        return view('professeurdashboard.presencel3create'  , compact('etudiants') );


    }


      public function validatepresencel3(Request $request){
   
        $data= $request->validate([
    
            'nom_cour' => 'required|string',
            'niveau' => 'required|string',
            'heure_cour' => 'required|string',
                  'etudiants' => 'required|array',
              'etudiants.*' => 'in:présent,absent',                  
        ]);
       
       try {

          foreach ($request->etudiants as $etudiant_id => $type_presence) {
       $presencel3 = Presencel3::create([
        
            'nom_cour'=>$request->nom_cour,
            'niveau'=>$request->niveau,
            'heure_cour'=>$request->heure_cour,
            'type_presence'=>$type_presence,
            'user_id'=>auth()->id(),
            'etudiant_id'=>$etudiant_id,
         
    
        ]);
         $admin = User::where('Is_admin', true)->get();


        foreach ($admin as $admin) {
            Mail::to($admin->email)->send(new Etudiantpresence ($admin ,$presencel3));
        }


        return redirect()->route('professeurdashboard.presencel3')->with('success','feuile de créer avec succès');
            }
  
       
       } catch (\Exception $e) {

              return redirect()->back()->with('error','une erreur lors de la creaction :' .$e->getMessage());

   
         
       }
    }



    
    public function editl3page(Presencel3 $presencel3){


             $etudiants = User::where('role', 'etudiant')->get();


        return view('professeurdashboard.presencel3edit'  , compact('presencel3' , 'etudiants'));

    }
    

    


    public function updatepresence(Request $request , Presencel3 $presencel3){


        $data= $request->validate([
           'nom_cour' => 'required|string',
            'niveau' => 'required|string',
            'heure_cour' => 'required|string',
            'type_presence' => 'required|string', 
         
  
      ]);
     try {
         foreach ($request->etudiants as $etudiant_id => $type_presence) {
      $presencel3->update([
         
             'nom_cour'=>$request->nom_cour,
            'niveau'=>$request->niveau,
            'heure_cour'=>$request->heure_cour,
            'type_presence'=>$request->type_presence,
            'user_id'=>auth()->id(),
            
        ]);

        

    return redirect()->route('professeurdashboard.presencel3')->with('success','feuile de créer avec succès');

       }   
     
     } catch (\Exception  $e) {
      return redirect()->back()->with('error' , 'erreur lors de la modification ' );
  
  }
  
       }


    
    public function destroyl3(Presencel3 $presencel3){

        $presencel3->delete();

      return redirect()->back()->with('success', 'Compte supprimé avec succès');

    }
    //
}
