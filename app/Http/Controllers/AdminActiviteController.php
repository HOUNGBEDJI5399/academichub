<?php

namespace App\Http\Controllers;
use App\Models\Activite;
use App\Models\User;
use App\Mail\Useractivite;
use App\Mail\Useractivitemodify;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;



use Illuminate\Http\Request;

class AdminActiviteController extends Controller
{
    

    public function activitecreatepage(){

        return view ('admindashboard.activitecreate');

    }



    public function activitepage(){

        $activites=Activite::all();

        return view ('admindashboard.activite', compact('activites'));

    }


    
    public function activiteeditpage(Activite $activite){


        return view ('admindashboard.activiteedit', compact('activite'));

     }
  

    public function validateactivite(Request $request){
   
        $data= $request->validate([
    
            'title' => 'required|string',
            'domaine' => 'required|string',
            'jour_heur' => 'required|string',
            'description' => 'required|string', 
               
        ]);
       
       try {
       $activite = Activite::create([
        
            'title'=>$request->title,
            'domaine'=>$request->domaine,
            'jour_heur'=>$request->jour_heur,
            'description'=>$request->description,
            'user_id'=>auth()->id(),
         
    
        ]);

        $etudiants = User::where('Is_etudiant', true)->get();

        foreach ($etudiants as $etudiant) {
            Mail::to($etudiant->email)->send(new Useractivite ($etudiant  , $activite));
        }
        return redirect()->route('admindashboard.activite')->with('success','activité créer avec succès');
       
       } catch (\Exception $e) {
        return redirect()->back()->with('error','une erreur lors de la creaction :' .$e->getMessage());
    
         
       }
    }
    


    
    public function updateactivite(Request $request , Activite $activite){


        $data= $request->validate([
          'title' => 'required|string',
          'domaine' => 'required|string',
          'jour_heur' => 'required|string',
          'description' => 'required|string', 
         
  
      ]);

     try {
      $activite->update([
          'title'=>$request->title ,
          'domaine'=>$request->domaine ,
          'jour_heur'=>$request->jour_heur ,
          'description'=>$request->description ,
          'user_id'=>auth()->id(),

            
        ]);

        $etudiants = User::where('Is_etudiant', true)->get();


        foreach ($etudiants as $etudiant) {
            Mail::to($etudiant->email)->send(new Useractivitemodify ($etudiant , $activite));
        }
        
        return redirect()->back()->with('success' , 'activite modifier avec succèe' );
    
     } catch (\Exception  $e) {
      return redirect()->back()->with('error' , 'erreur lors de la modification ' );
  
  }
  
       }



    public function destroy(Activite $activite){

        $activite->delete();
        return redirect()->back()->with('success' , ' supprimer avec succèe' );


     }



     }







