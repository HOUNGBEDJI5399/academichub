<?php

namespace App\Http\Controllers;
use App\Models\Ue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminUeController extends Controller
{
    
      
    public function uecreatepage(){

        return view('admindashboard.uecreate');

    }



    public function uepage(){

        $ues=Ue::all();

        return view('admindashboard.ue',compact('ues'));

    }


    
    public function ueeditpage(Ue $ue){

        return view('admindashboard.ueedit', compact('ue'));

        }
  


    public function ueadmin (Request $request){


   
        $data= $request->validate([
    
            'nom_ue' => 'required|string',
            'credit' => 'required|integer',
            'semestre' => 'required|string',
            'niveau' => 'required|string', 
               
        ]);
       
       try {
        
      $ue = Ue::create([
        
            'nom_ue'=>$request->nom_ue,
            'credit'=>$request->credit,
            'semestre'=>$request->semestre,
            'niveau'=>$request->niveau,
            'user_id'=> auth()->id(),
         
    
        ]);

        return redirect()->route('admindashboard.ue')->with('success','UE créer avec succèe');
       
       } 
       catch (\Exception $e) {
        return redirect()->back()->with('error', 'Erreur lors de la création de l\'UE : ' . $e->getMessage());
    }
    

    }


    
    public function update (Request $request , Ue $ue){


        $data= $request->validate([
             'nom_ue' => 'required|string',
             'credit' => 'required|integer',
             'semestre' => 'required|string',
             'niveau' => 'required|string', 
            
               
      ]);
     try {
       $ue->update([
        'nom_ue'=>$request->nom_ue,
        'credit'=>$request->credit,
        'semestre'=>$request->semestre,
        'niveau'=>$request->niveau,
        'user_id'=> auth()->id(),

         
        ]);

        return redirect()->route('admindashboard.ue')->with('success','UE modifié avec succè');

    
     } catch (\Exception  $e) {
      return redirect()->back()->with('error' , 'Erreur lors de la modification de UE :' .$e->getMessage() );
  
  }
  
       }



    public function destroy(Ue $ue){

        $ue->delete();
        
        return redirect()->route('admindashboard.ue')->with('success' , ' supprimer avec succèe' );


     }
}
