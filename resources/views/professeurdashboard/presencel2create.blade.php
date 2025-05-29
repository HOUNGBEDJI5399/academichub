@extends('layouts.app3')

@section('content')

<div class="container">
    <h1> Créer une Feuille de Présence  L2</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('presencel2prof') }}" method="POST">
        @csrf

        <!-- Infos du cours -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h2 class="h5 mb-0">Détails du Cours</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="nom_cour">Nom du Cours</label>
                        <input type="text" class="form-control" id="nom_cour" name="nom_cour" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="niveau">Niveau</label>
                        <select class="form-control" id="niveau" name="niveau" required>
                            <option value="">Choisir un niveau</option>
                            <option value="L1">L1</option>
                            <option value="L2">L2</option>
                            <option value="L3">L3</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="heure_cour">Heure du Cours</label>
                        <input type="text" class="form-control" id="heure_cour" name="heure_cour" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Liste des étudiants -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="h5 mb-0">Liste des Étudiants L2</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead  >
                            <tr>
                                <th>Nom </th>
                                <th>Type de Présence</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($etudiants as $etudiant)
                                <tr>
                                    <td>{{ $etudiant->firstname }} {{ $etudiant->lastname }}</td> 
                 <td>

                 <div class="radio-group">
                

                <select class="form-control" name="etudiants[{{ $etudiant->id }}]" required>
    <option value="">Sélectionner</option>
    <option value="présent">Présent</option>
    <option value="absent">Absent</option>
</select>

           
       </div>
           </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center">Aucun étudiant trouvé</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit"  class="btn btn-primary btn-lg w-100">✅ Enregistrer les présences</button>
            </div>
        </div>
    </form>
</div>

<style>
    .radio-group {
        display: flex;
        gap: 15px;
    }
    .radio-option {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    table th, table td {
        padding: 12px; /* Ajuster l'espace entre les éléments de la table */
    }
    input{
        height: 35px;
     border-radius: 5px;

    }

    select{
         height: 35px; 
         border-radius: 5px;
    }
</style>

@endsection
