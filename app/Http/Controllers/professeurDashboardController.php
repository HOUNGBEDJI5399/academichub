<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Cour;
use App\Models\User;
use App\Mail\usercour;
use App\Mail\Usercourmodify;
use Illuminate\Support\Facades\Mail;

class professeurDashboardController extends Controller
{
    public function headerpage()
    {
        return view('professeurdashboard.header');
    }

    public function acceuilpage()
    {
        return view('professeurdashboard.acceuil');
    }

    public function courcreatepage()
    {
        return view('professeurdashboard.courcreate');
    }

    public function courpage(){
    
        $cours = Cour::where('user_id', auth()->id())->get();
        return view('professeurdashboard.cour', compact('cours'));
    }




    public function editpage($id)
    {
        $cour = Cour::where('user_id', auth()->id())->findOrFail($id);
    
        return view('professeurdashboard.couredit', compact('cour'));
    }

  

    public function validatecour(Request $request)
    {
        $validated = $request->validate([
            'nom_cour' => 'required|string|max:255',
            'categorie' => 'required|in:L1,L2,L3',
            'fichier' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx|max:10240',
        ]);

        $fichierNom = null;
        $fichierType = null;
        $fichierPath = null;

        if ($request->hasFile('fichier') && $request->file('fichier')->isValid()) {
            $fichier = $request->file('fichier');
            $fichierNom = time() . '_' . $fichier->getClientOriginalName();
            $fichierType = $fichier->getClientOriginalExtension();
            $fichierPath = $fichier->store('cours', 'public');

        }

        $cour = Cour::create([
            'nom_cour' => $request->nom_cour,
            'categorie' => $request->categorie,
            'fichier' => $fichierNom,
            'fichierType' => $fichierType,
            'fichierPath' => $fichierPath,
            'user_id' => auth()->id(),
        ]);

        $etudiants = User::where('Is_etudiant', true)->get();
        foreach ($etudiants as $etudiant) {
            Mail::to($etudiant->email)->send(new Usercour($etudiant, $cour));
        }

        return redirect()->route('professeurdashboard.cour' )
                         ->with('success', 'Cours ajouté avec succès !');
    }

    public function updatecour(Request $request, $id)
    {
        $validated = $request->validate([
            'nom_cour' => 'required|string|max:255',
            'categorie' => 'required|in:L1,L2,L3',
            'fichier' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx|max:10240',
        ]);

        $cour = Cour::findOrFail($id);

        $fichierNom = $cour->fichier;
        $fichierType = $cour->fichierType;
        $fichierPath = $cour->fichierPath;

        if ($request->hasFile('fichier') && $request->file('fichier')->isValid()) {
            $fichier = $request->file('fichier');
            $fichierNom = time() . '_' . $fichier->getClientOriginalName();
            $fichierType = $fichier->getClientOriginalExtension();
            $fichierPath = $fichier->store('cours', 'public');            
          
        }

        $cour->update([
            'nom_cour' => $request->nom_cour,
            'categorie' => $request->categorie,
            'fichier' => $fichierNom,
            'fichierType' => $fichierType,
            'fichierPath' => $fichierPath,
            'user_id' => auth()->id(),
        ]);

        $etudiants = User::where('Is_etudiant', true)->get();
        foreach ($etudiants as $etudiant) {
            Mail::to($etudiant->email)->send(new Usercourmodify($etudiant, $cour));
        }

        return redirect()->route('professeurdashboard.cour' )
                         ->with('success', 'Cours mis à jour avec succès !');
    }

    public function destroy($id)
    {
        $cour = Cour::findOrFail($id);

        if ($cour->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas supprimer ce cours.');
        }

        $cour->delete();

        return redirect()->back()->with('success', 'Cours supprimé avec succès.');
    }


    
}
