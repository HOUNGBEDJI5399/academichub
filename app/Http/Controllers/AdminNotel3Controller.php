<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Notel3;

use Illuminate\Http\Request;


class AdminNotel3Controller extends Controller
{


    
      public function notel3page()
    {
        $notesl3 = Notel3::with('etudiant')->get(); 

        $etudiants = User::where('role', 'etudiant')
            ->where('niveau', 'L3')
            ->get();

        return view('admindashboard.notel3', compact('notesl3', 'etudiants'));
    }

    public function notel3createpage()
    {
        $etudiants = User::where('role', 'etudiant')
            ->where('niveau', 'L3')
            ->get();

        return view('admindashboard.notel3create', compact('etudiants'));
    }

    public function validatenotel3(Request $request)
    {
     
        
        $rules = [
            'notesl3' => 'required|array',
            'notesl3.*' => 'array',
        ];

        for ($ue = 1; $ue <= 5; $ue++) {
            for ($matiere = 1; $matiere <= 3; $matiere++) {
                $rules["notesl3.*.ue{$ue}_m{$matiere}_dev1"] = 'nullable|numeric|between:0,20';
                $rules["notesl3.*.ue{$ue}_m{$matiere}_dev2"] = 'nullable|numeric|between:0,20';
                $rules["notesl3.*.ue{$ue}_m{$matiere}_exam"] = 'nullable|numeric|between:0,20';
            }
        }

        $validated = $request->validate($rules);

        foreach ($validated['notesl3'] as $etudiant_id => $notesl2Data) {
      
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
           
                $existingNotel3 = Notel3::where('etudiant_id', $etudiant_id)->first();

                if ($existingNote) {
              
                    $existingNote->update($noteDataToUpdate);
                } else {
               
                    $noteDataToUpdate['etudiant_id'] = $etudiant_id;
                    Notel3::create($noteDataToUpdate);
                }
            }
        }

        return redirect()->route('admindashboard.notel3')->with('success', 'Notes enregistrées avec succès.');
    }

    public function editl3page(Notel3 $notel3)
    {
        return view('notel3edit', compact('notel3'));
    }

    public function updatenotel2(Request $request, Notel3 $notel3)
    {
        $rules = [];
        
     
        for ($ue = 1; $ue <= 5; $ue++) {
            for ($matiere = 1; $matiere <= 3; $matiere++) {
                $rules["ue{$ue}_m{$matiere}_dev1"] = 'nullable|numeric|between:0,20';
                $rules["ue{$ue}_m{$matiere}_dev2"] = 'nullable|numeric|between:0,20';
                $rules["ue{$ue}_m{$matiere}_exam"] = 'nullable|numeric|between:0,20';
            }
        }

        $validated = $request->validate($rules);

        $dataToUpdate = [];
        foreach ($validated as $key => $value) {
            if ($value !== '' && $value !== null) {
                $dataToUpdate[$key] = (float)$value;
            } elseif ($value === '') {
           
             
            }
        }

      
        if (!empty($dataToUpdate)) {
            $notel2->update($dataToUpdate);
        }

        return redirect()->route('admindashboard.notel3')->with('success', 'Note mise à jour avec succès.');
    }

    public function destroyl3(Notel3 $notel3)
    {
        $note->delete();

        return redirect()->back()->with('success', 'Note supprimée avec succès.');
    //
}
    //
}
