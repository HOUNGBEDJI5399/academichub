<?php

namespace App\Http\Controllers;
use App\Models\Matiere;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


use Illuminate\Http\Request;

class AdminMatiereController extends Controller
{


    
    public function matierecreatepage(){

        return view('admindashboard.matierecreate');

    }



    public function matierepage(){

        $matieres=Matiere::all();

        return view('admindashboard.matiere',compact('matieres'));

    }


    
    public function matiereeditpage(Matiere $matiere){

        return view('admindashboard.matiereedit', compact('matiere'));

        }
  


    public function validatematiere(Request $request){
   
        $data= $request->validate([
    
            'nom_prof' => 'required|string',
            'nom_matiere' => 'required|string',
            'niveau' => 'required|string',
            'ue' => 'required|string', 
               
        ]);
       
       try {
       $matiere = Matiere::create([
        
            'nom_prof'=>$request->nom_prof,
            'nom_matiere'=>$request->nom_matiere,
            'niveau'=>$request->niveau,
            'ue'=>$request->ue,
            'user_id'=>auth()->id(),
         
    
        ]);

        return redirect()->route('admindashboard.matiere')->with('success','matière créer avec succè');
       
       } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Erreur lors de la création de la matière : ' . $e->getMessage());
    }    
         
       }
    


    
    public function updatematiere(Request $request , Matiere $matiere){


        $data= $request->validate([
            'nom_prof' => 'required|string',
            'nom_matiere' => 'required|string',
            'niveau' =>'required|string',
            'ue' =>'required|string', 
            
               
      ]);
     try {

        $matiere->update([
        'nom_prof'=>$request->nom_prof,
        'nom_matiere'=>$request->nom_matiere,
        'niveau'=>$request->niveau,
        'ue'=>$request->ue,
        'user_id'=>auth()->id(),

        ]);

      
        
        return redirect()->back()->with('success' , 'matiere modifier avec succè' );
    
     } catch (\Exception  $e) {
      return redirect()->back()->with('error' , 'matiere lors de la modification ' );
  
  }
  
       }



    public function destroy(Matiere $matiere){

        $matiere->delete();
        return redirect()->back()->with('success' , ' supprimer avec succè' );

     }
     
    
}

