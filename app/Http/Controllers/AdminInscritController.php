<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Inscrit;

class AdminInscritController extends Controller
{
    public function inscritcreatepage()
    {
        return view('admindashboard.inscritcreate');
    }

    public function inscritpage()
    {
        $inscrits = Inscrit::all();
        return view('admindashboard.inscrit', compact('inscrits'));
    }

    public function inscriteditpage(Inscrit $inscrit)
    {
        return view('admindashboard.inscritedit', compact('inscrit'));
    }

    public function validateinscrit(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
             'email' => 'required|email|unique:inscrit',
            'niveau' => 'required|string',
            'annee' => 'required|string',
            'tel' => 'required|string',
        ]);

        
        $matricule = '';

      do {
    $year = date('Y');
    $initials = strtoupper(substr($request->prenom, 0, 1) . substr($request->nom, 0, 1));
    $count = Inscrit::count() + 1;
    $counter = str_pad($count, 4, '0', STR_PAD_LEFT);

    $matricule = $year . 'A' . $initials . $counter;
} while (Inscrit::where('matricule', $matricule)->exists());


        
        try {
            $inscrit = Inscrit::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'niveau' => $request->niveau,
                'annee' => $request->annee,
                'tel' => $request->tel,
                'matricule' => $matricule,
                'user_id' => auth()->id(),
            ]);

            return redirect()->route('admindashboard.inscrit')->with('success', 'Inscription faite avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('admindashboard.inscritcreate')->with('error', "Erreur lors de l'inscription.");
        }
    }

    public function updateinscrit(Request $request, Inscrit $inscrit)
    {
        $data = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:inscrit,email,' . $inscrit->id,
            'niveau' => 'required|string',
            'annee' => 'required|string',
            'tel' => 'required|string',
        ]);

        try {
            $inscrit->update([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'niveau' => $request->niveau,
                'annee' => $request->annee,
                'tel' => $request->tel,
                'user_id' => auth()->id(),
            ]);

            return redirect()->back()->with('success', 'Inscription de l\'étudiant modifiée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la modification.');
        }
    }

    public function destroy(Inscrit $inscrit)
    {
        $inscrit ->delete();

        return redirect()->back()->with('success', 'Étudiant supprimé avec succès.');
    }
}
