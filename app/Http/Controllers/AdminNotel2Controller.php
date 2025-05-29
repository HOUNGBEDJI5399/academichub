<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Notel2;


use Illuminate\Http\Request;

class AdminNotel2Controller extends Controller
{


      public function notel2page()
    {
        $notesl2 = Notel2::with('etudiant')->get(); 

        $etudiants = User::where('role', 'etudiant')
            ->where('niveau', 'L2')
            ->get();

        return view('admindashboard.notel2', compact('notesl2', 'etudiants'));
    }

    public function notel2createpage()
    {
        $etudiants = User::where('role', 'etudiant')
            ->where('niveau', 'L2')
            ->get();

        return view('admindashboard.notel2create', compact('etudiants'));
    }

    public function validatenotel2(Request $request)
    {
     
        
        $rules = [
            'notesl2' => 'required|array',
            'notesl2.*' => 'array',
        ];

        for ($ue = 1; $ue <= 5; $ue++) {
            for ($matiere = 1; $matiere <= 3; $matiere++) {
                $rules["notesl2.*.ue{$ue}_m{$matiere}_dev1"] = 'nullable|numeric|between:0,20';
                $rules["notesl2.*.ue{$ue}_m{$matiere}_dev2"] = 'nullable|numeric|between:0,20';
                $rules["notesl2.*.ue{$ue}_m{$matiere}_exam"] = 'nullable|numeric|between:0,20';
            }
        }

        $validated = $request->validate($rules);

        foreach ($validated['notesl2'] as $etudiant_id => $notesl2Data) {
      
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
           
                $existingNotel2 = Notel2::where('etudiant_id', $etudiant_id)->first();

                if ($existingNote) {
              
                    $existingNote->update($noteDataToUpdate);
                } else {
               
                    $noteDataToUpdate['etudiant_id'] = $etudiant_id;
                    Notel2::create($noteDataToUpdate);
                }
            }
        }

        return redirect()->route('admindashboard.notel2')->with('success', 'Notes enregistrées avec succès.');
    }

    public function editl2page(Notel2 $notel2)
    {
        return view('notel2edit', compact('notel2'));
    }

    public function updatenotel2(Request $request, Notel2 $notel2)
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

        return redirect()->route('admindashboard.notel2')->with('success', 'Note mise à jour avec succès.');
    }

    public function destroyl2(Notel2 $notel2)
    {
        $note->delete();

        return redirect()->back()->with('success', 'Note supprimée avec succès.');
    //
}
}
