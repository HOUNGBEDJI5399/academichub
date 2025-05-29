<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Note;

class AdminNoteController extends Controller
{
    public function notepage()
    {
        $notes = Note::with('etudiant')->get(); 

        $etudiants = User::where('role', 'etudiant')
            ->where('niveau', 'L1')
            ->get();

        return view('admindashboard.note', compact('notes', 'etudiants'));
    }

    public function notecreatepage()
    {
        $etudiants = User::where('role', 'etudiant')
            ->where('niveau', 'L1')
            ->get();

        return view('admindashboard.notecreate', compact('etudiants'));
    }

    public function validatenote(Request $request)
    {
        $rules = [
            'notes' => 'required|array',
            'notes.*' => 'array',
        ];

        for ($ue = 1; $ue <= 5; $ue++) {
            for ($matiere = 1; $matiere <= 3; $matiere++) {
                $rules["notes.*.ue{$ue}_m{$matiere}_dev1"] = 'nullable|numeric|between:0,20';
                $rules["notes.*.ue{$ue}_m{$matiere}_dev2"] = 'nullable|numeric|between:0,20';
                $rules["notes.*.ue{$ue}_m{$matiere}_exam"] = 'nullable|numeric|between:0,20';
            }
        }

        $validated = $request->validate($rules);

        foreach ($validated['notes'] as $etudiant_id => $notesData) {
            $etudiant = User::find($etudiant_id);
            if (!$etudiant) {
                continue;
            }

            $noteDataToUpdate = [];
            $hasNewData = false;

            for ($ue = 1; $ue <= 5; $ue++) {
                for ($matiere = 1; $matiere <= 3; $matiere++) {
                    $dev1Key = "ue{$ue}_m{$matiere}_dev1";
                    $dev2Key = "ue{$ue}_m{$matiere}_dev2";
                    $examKey = "ue{$ue}_m{$matiere}_exam";

                    $dev1 = isset($notesData[$dev1Key]) && $notesData[$dev1Key] !== '' ? (float)$notesData[$dev1Key] : null;
                    $dev2 = isset($notesData[$dev2Key]) && $notesData[$dev2Key] !== '' ? (float)$notesData[$dev2Key] : null;
                    $exam = isset($notesData[$examKey]) && $notesData[$examKey] !== '' ? (float)$notesData[$examKey] : null;

                    if ($dev1 !== null) {
                        $noteDataToUpdate[$dev1Key] = $dev1;
                        $hasNewData = true;
                    }
                    if ($dev2 !== null) {
                        $noteDataToUpdate[$dev2Key] = $dev2;
                        $hasNewData = true;
                    }
                    if ($exam !== null) {
                        $noteDataToUpdate[$examKey] = $exam;
                        $hasNewData = true;
                    }
                }
            }

            if ($hasNewData) {
                $existingNote = Note::where('etudiant_id', $etudiant_id)->first();

                if ($existingNote) {
                    $existingNote->update($noteDataToUpdate);
                } else {
                    $noteDataToUpdate['etudiant_id'] = $etudiant_id;
                    Note::create($noteDataToUpdate);
                }
            }
        }

        return redirect()->route('admindashboard.note')->with('success', 'Notes enregistrées avec succès.');
    }

    public function editpage($id) 
    {
        // Récupérer la note par ID
        $note = Note::with('etudiant')->findOrFail($id);
        
        // Debug - ajoutez ceci temporairement pour voir ce qui se passe
        // dd($note->toArray());
        
        return view('admindashboard.noteedit', compact('note'));
    }

    public function note(Request $request, $id)
    {
        // Récupérer la note à mettre à jour
        $note = Note::findOrFail($id);
        
        // Debug - ajoutez ceci temporairement
        // dd($request->all(), $note->toArray());
        
        $rules = [];
        
        // Validation des règles pour toutes les UE et matières
        for ($ue = 1; $ue <= 5; $ue++) {
            for ($matiere = 1; $matiere <= 3; $matiere++) {
                $rules["ue{$ue}_m{$matiere}_dev1"] = 'nullable|numeric|between:0,20';
                $rules["ue{$ue}_m{$matiere}_dev2"] = 'nullable|numeric|between:0,20';
                $rules["ue{$ue}_m{$matiere}_exam"] = 'nullable|numeric|between:0,20';
            }
        }

        try {
            $validated = $request->validate($rules);
            
            // Préparer les données à mettre à jour
            $dataToUpdate = [];
            
            foreach ($validated as $key => $value) {
                if ($value !== null && $value !== '') {
                    $dataToUpdate[$key] = (float)$value;
                } else {
                    // Garder null pour les champs vides
                    $dataToUpdate[$key] = null;
                }
            }

            // Mettre à jour la note
            $note->update($dataToUpdate);

            return redirect()->route('admindashboard.note')
                           ->with('success', 'Note mise à jour avec succès.');
                           
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                           ->withErrors($e->errors())
                           ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Erreur lors de la mise à jour : ' . $e->getMessage())
                           ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $note = Note::findOrFail($id);
            $note->delete();
            
            return redirect()->route('admindashboard.note')
                           ->with('success', 'Note supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }
}