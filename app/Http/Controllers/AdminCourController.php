<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cour;
use App\Models\User;


class AdminCourController extends Controller
{
    

 
    public function courpage() {

        $cours = Cour::all();


        return view('admindashboard.cours'  ,compact('cours'));
        
    }


  

        public function destroy($id){
  
       $cour = Cour::findOrFail($id);


         $cour->delete();

    return redirect()->route('admindashboard.cours')->with('success', 'Cours supprimé avec succès.');
}


    }







   
        



