<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Presencel2;
use App\Models\User;
use App\Mail\Etudiantpresence;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class ProfesseurPresencel2Controller extends Controller


{

    

    
    public function presencel2page(){


    $presencesl2 = Presencel2::with('etudiant')->get(); 

    $etudiants = User::where('role', 'etudiant')
        ->where('niveau', 'L2')
        ->get();

            return view('professeurdashboard.presencel2', compact('presencesl2', 'etudiants'));


    }
    


    


    
    

    public function presencel2createpage(){

                $etudiants = User::where('role', 'etudiant')

                 ->where('niveau', 'L2') 
                 ->get();

                

        return view('professeurdashboard.presencel2create'  , compact('etudiants') );


    }

    
    



      public function validatepresencel2(Request $request){
   
        $data= $request->validate([
    
            'nom_cour' => 'required|string',
            'niveau' => 'required|string',
            'heure_cour' => 'required|string',
             'etudiants' => 'required|array',
              'etudiants.*' => 'in:présent,absent',                 
        ]);
       
       try {

             foreach ($request->etudiants as $etudiant_id => $type_presence) {

       $presencel2 = Presencel2::create([
        
            'nom_cour'=>$request->nom_cour,
            'niveau'=>$request->niveau,
            'heure_cour'=>$request->heure_cour,
            'type_presence'=>$type_presence,
            'user_id'=>auth()->id(),
            'etudiant_id'=>$etudiant_id,
         
    
        ]);
         $admin = User::where('Is_admin', true)->get();


        foreach ($admin as $admin) {
            Mail::to($admin->email)->send(new Etudiantpresence ($admin ,$presencel2));
        }


        return redirect()->route('professeurdashboard.presencel2')->with('success','feuile de créer avec succès');
        }
       } catch (\Exception $e) {

              return redirect()->back()->with('error','une erreur lors de la creaction :' .$e->getMessage());

   
         
       }
    }



    
    

    
    public function editl2page(Presencel2 $presencel2){


             $etudiants = User::where('role', 'etudiant')->get();


        return view('professeurdashboard.presencel2edit'  , compact('presencel2' , 'etudiants'));

    }
    

    

    


    public function updatepresencel2(Request $request , Presencel2 $presencel2){


        $data= $request->validate([
           'nom_cour' => 'required|string',
            'niveau' => 'required|string',
            'heure_cour' => 'required|string',
            'etudiants' => 'required|array',
              'etudiants.*' => 'in:présent,absent',  
  
      ]);
     try {

      $presencel2->update([
         
             'nom_cour'=>$request->nom_cour,
            'niveau'=>$request->niveau,
            'heure_cour'=>$request->heure_cour,
            'type_presence'=>$request->type_presence,
            'user_id'=>auth()->id(),
             'etudiant_id'=>$etudiant_id,

            
        ]);

        

    return redirect()->route('professeurdashboard.presencel2')->with('success','feuile de créer avec succès');

       
     
     } catch (\Exception  $e) {
      return redirect()->back()->with('error' , 'erreur lors de la modification ' );
  
  }
  
       }




        
    public function destroyl2(Presencel3 $presencel2){

        $presencel2->delete();

      return redirect()->back()->with('success', 'Compte supprimé avec succès');

    }
    //




}
