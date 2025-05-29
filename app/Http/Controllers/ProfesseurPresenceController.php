<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Presence;
use App\Models\User;
use App\Mail\Etudiantpresence;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class ProfesseurPresenceController extends Controller
{
    //

    
public function presencepage()
{
    $presences = Presence::with('etudiant')->get(); 

    $etudiants = User::where('role', 'etudiant')
        ->where('niveau', 'L1')
        ->get();

    return view('professeurdashboard.presence', compact('presences', 'etudiants'));
}


    


    public function presencecreatepage(){

                $etudiants = User::where('role', 'etudiant')

                ->where('niveau', 'L1')

                 ->get();

                

        return view('professeurdashboard.presencecreate'  , compact(  'etudiants'));


    }


    


      public function validatepresence(Request $request){
   
        $data= $request->validate([
    
            'nom_cour' => 'required|string',
            'niveau' => 'required|string',
            'heure_cour' => 'required|string',
             'etudiants' => 'required|array',
              'etudiants.*' => 'in:présent,absent',   
               
        ]);
       
       try {
        
                foreach ($request->etudiants as $etudiant_id => $type_presence) {
                    

       $presence = Presence::create([
        
            'nom_cour'=>$request->nom_cour,
            'niveau'=>$request->niveau,
            'heure_cour'=>$request->heure_cour,
             'type_presence' => $type_presence,
            'user_id'=>auth()->id(),
            'etudiant_id'=>$etudiant_id,
         
    
        ]);
         $admin = User::where('Is_admin', true)->get();


        foreach ($admin as $admin) {
            Mail::to($admin->email)->send(new Etudiantpresence ($admin ,$presence));
        }
    


        return redirect()->route('professeurdashboard.presence')->with('success','feuile de créer avec succès');
            }
       
       } catch (\Exception $e) {
        return redirect()->back()->with('error','une erreur lors de la creaction :' .$e->getMessage());
    
         
       }
    }
    
    
    public function editpage(Presence $presence){
        

        
     $etudiants = User::where('role', 'etudiant')->get();




        return view('professeurdashboard.presenceedit'  , compact( 'presence' ,'etudiants'));

    }



    public function updatepresence(Request $request , Presence $presence){


        $data= $request->validate([
           'nom_cour' => 'required|string',
            'niveau' => 'required|string',
            'heure_cour' => 'required|string',
            'etudiants' => 'required|array',
              'etudiants.*' => 'in:présent,absent',               
  
      ]);
     try {
      
                          foreach ($request->etudiants as $etudiant_id => $type_presence) {

      $presence->update([
         
             'nom_cour'=>$request->nom_cour,
            'niveau'=>$request->niveau,
            'heure_cour'=>$request->heure_cour,
            'type_presence'=>$request->type_presence,
            'user_id'=>auth()->id(),
            'etudiant_id'=>$etudiant_id,
            
        ]);

       
        
        return redirect()->back()->with('success' , 'présence modifier avec succè' );
     
   }
  
     } catch (\Exception  $e) {
      return redirect()->back()->with('error' , 'erreur lors de la modification ' );
  
  }
  
  
       }
       
   public function destroy(Presence $presence){

        $presence->delete();

      return redirect()->back()->with('success', 'feuille presence supprimé avec succès');

    }



  



}
