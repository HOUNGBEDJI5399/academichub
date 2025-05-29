<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\User; 
use App\Mail\Userannonce;
use App\Mail\Userannoncemodify;

class AdminAnnonceController extends Controller
{
    

    public function annoncecreatepage(){

        return view ('admindashboard.annoncecreate');

    }



    public function annoncepage(){

        $annonces=Annonce::all();

        return view ('admindashboard.annonce', compact('annonces'));

    }


    
    public function editpage(Annonce $annonce){

        return view ('admindashboard.editannonce', compact('annonce'));

        }
  


    public function validateannonce(Request $request){
   
        $data= $request->validate([
    
            'title' => 'required|string',
            'description' => 'required|string', 
               
        ]);
       
       try {
        $annonce  = Annonce::create([
        
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>auth()->id(),
         
    
        ]);

        $etudiants = User::where('Is_etudiant', true)->get();

        foreach ($etudiants as $etudiant) {
            Mail::to($etudiant->email)->send(new Userannonce ($etudiant ,$annonce));
        }
        return redirect()->route('admindashboard.annonce')->with('success','annonce créer avec succè');
       
       } catch (\Exception $e) {
        return redirect()->route('admindashboard.annonce')->with('success','annonce  créer mais mail non envoyé');
    
         
       }
    }


    
    public function updateannonce(Request $request , Annonce $annonce){


        $data= $request->validate([
          'title' => 'required|string',
          'description' => 'required|string', 
         
  
      ]);
     try {
      $annonce->update([
          'title'=>$request->title ,
          'description'=>$request->description ,
          'user_id'=>auth()->id(),
            
        ]);

        $etudiants = User::where('Is_etudiant', true)->get();


        foreach ($etudiants as $etudiant) {
            Mail::to($etudiant->email)->send(new Userannoncemodify ($etudiant ,$annonce));
        }
        
        return redirect()->back()->with('success' , 'annonce modifier avec succè' );
    
     } catch (\Exception  $e) {
      return redirect()->back()->with('error' , 'erreur lors de la modification ' );
  
  }
  
       }



    public function destroy(Annonce $annonce){

        $annonce->delete();
        return redirect()->back()->with('success' , ' supprimer avec succè' );
     }
}
