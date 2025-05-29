<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;

class ClubController extends Controller
{
   
   


    public function inscritpage() {

        return view ('etudiantdashboard.inscritclub');
        
    }

    public function clubvalidate(Request $request){
        $data= $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string', 
            'clube' => 'required|string', 
            'année' => 'required|string', 
    
        ]);


        try {
            $club = new Club;

        $club->firstname=$request->firstname;
        $club->lastname=$request->lastname;
        $club->clube=$request->clube;
        $club->année=$request->année;
        $club->user_id=auth()->id();

        $club->save();

        return redirect()->route('etudiantdashboard.club')->with('success','vous êtes inscrit avec succée');

        } catch (\Exception $e) {
            return redirect()->back()->with('error','une erreur lors de votre inscription :' .$e->getMessage());

        }

    }

}


