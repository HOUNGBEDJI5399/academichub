<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = 'note';

    protected $fillable = [
        'etudiant_id',
        // UE 1
        'ue1_m1_dev1', 'ue1_m1_dev2', 'ue1_m1_exam',
        'ue1_m2_dev1', 'ue1_m2_dev2', 'ue1_m2_exam',
        'ue1_m3_dev1', 'ue1_m3_dev2', 'ue1_m3_exam',
        // UE 2
        'ue2_m1_dev1', 'ue2_m1_dev2', 'ue2_m1_exam',
        'ue2_m2_dev1', 'ue2_m2_dev2', 'ue2_m2_exam',
        'ue2_m3_dev1', 'ue2_m3_dev2', 'ue2_m3_exam',
        // UE 3
        'ue3_m1_dev1', 'ue3_m1_dev2', 'ue3_m1_exam',
        'ue3_m2_dev1', 'ue3_m2_dev2', 'ue3_m2_exam',
        'ue3_m3_dev1', 'ue3_m3_dev2', 'ue3_m3_exam',
        // UE 4
        'ue4_m1_dev1', 'ue4_m1_dev2', 'ue4_m1_exam',
        'ue4_m2_dev1', 'ue4_m2_dev2', 'ue4_m2_exam',
        'ue4_m3_dev1', 'ue4_m3_dev2', 'ue4_m3_exam',
        // UE 5
        'ue5_m1_dev1', 'ue5_m1_dev2', 'ue5_m1_exam',
        'ue5_m2_dev1', 'ue5_m2_dev2', 'ue5_m2_exam',
        'ue5_m3_dev1', 'ue5_m3_dev2', 'ue5_m3_exam',
    ];

    protected $casts = [
        // UE 1
        'ue1_m1_dev1' => 'float', 'ue1_m1_dev2' => 'float', 'ue1_m1_exam' => 'float',
        'ue1_m2_dev1' => 'float', 'ue1_m2_dev2' => 'float', 'ue1_m2_exam' => 'float',
        'ue1_m3_dev1' => 'float', 'ue1_m3_dev2' => 'float', 'ue1_m3_exam' => 'float',
        // UE 2
        'ue2_m1_dev1' => 'float', 'ue2_m1_dev2' => 'float', 'ue2_m1_exam' => 'float',
        'ue2_m2_dev1' => 'float', 'ue2_m2_dev2' => 'float', 'ue2_m2_exam' => 'float',
        'ue2_m3_dev1' => 'float', 'ue2_m3_dev2' => 'float', 'ue2_m3_exam' => 'float',
        // UE 3
        'ue3_m1_dev1' => 'float', 'ue3_m1_dev2' => 'float', 'ue3_m1_exam' => 'float',
        'ue3_m2_dev1' => 'float', 'ue3_m2_dev2' => 'float', 'ue3_m2_exam' => 'float',
        'ue3_m3_dev1' => 'float', 'ue3_m3_dev2' => 'float', 'ue3_m3_exam' => 'float',
        // UE 4
        'ue4_m1_dev1' => 'float', 'ue4_m1_dev2' => 'float', 'ue4_m1_exam' => 'float',
        'ue4_m2_dev1' => 'float', 'ue4_m2_dev2' => 'float', 'ue4_m2_exam' => 'float',
        'ue4_m3_dev1' => 'float', 'ue4_m3_dev2' => 'float', 'ue4_m3_exam' => 'float',
        // UE 5
        'ue5_m1_dev1' => 'float', 'ue5_m1_dev2' => 'float', 'ue5_m1_exam' => 'float',
        'ue5_m2_dev1' => 'float', 'ue5_m2_dev2' => 'float', 'ue5_m2_exam' => 'float',
        'ue5_m3_dev1' => 'float', 'ue5_m3_dev2' => 'float', 'ue5_m3_exam' => 'float',
    ];

    public function etudiant()
    {
        return $this->belongsTo(User::class, 'etudiant_id');
    }

    // Méthodes helper pour récupérer les notes par UE/matière
    public function getNotesByUE($ue)
    {
        $notes = [];
        for ($matiere = 1; $matiere <= 3; $matiere++) {
            $notes["m{$matiere}"] = [
                'dev1' => $this->{"ue{$ue}_m{$matiere}_dev1"},
                'dev2' => $this->{"ue{$ue}_m{$matiere}_dev2"},
                'exam' => $this->{"ue{$ue}_m{$matiere}_exam"},
            ];
        }
        return $notes;
    }

    public function getNote($ue, $matiere, $type)
    {
        return $this->{"ue{$ue}_m{$matiere}_{$type}"};
    }
}