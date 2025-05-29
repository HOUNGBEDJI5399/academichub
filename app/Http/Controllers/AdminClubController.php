<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;


class AdminClubController extends Controller
{




    public function clubpage(){


    $clubs = Club::all();

   return view ('admindashboard.club', compact('clubs'));

}


public function clubeditpage(Club $club){


   return view ('admindashboard.clubedit', compact('club'));

}



public function clubupdate(Request $request , Club $club){


    $data= $request->validate([
      'firstname' => 'required|string',
      'lastname' => 'required|string', 
      'clube' => 'required|string', 
      'année' => 'required|string', 

  ]);

 try {

      $club->update([
        'firstname'=>$request->firstname,
        'lastname'=>$request->lasstname,
        'clube'=>$request->clube,
        'année'=>$request->année,
     
    ]);
    
    return redirect()->back()->with('success' , ' club etudiant modifier avec succèe' );

 } catch (\Exception  $e) {

  return redirect()->back()->with('error' , 'erreur lors de la modification ' );

}

}


public function destroy(Club $club){

    $club->delete();
    return redirect()->back()->with('success' , 'etudiant  supprimer du club avec succè' );


 }

}







