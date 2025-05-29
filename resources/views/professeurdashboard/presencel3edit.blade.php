@extends('layouts.app3')

@section('content')

<div class="container">
    <h1>Modifier la Feuille de Présence</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('presencel3update', $presenceGroup->first()->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Infos du cours -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h2 class="h5 mb-0">Détails du Cours</h2>
            </div>
            <div class="card-body row">
                <div class="col-md-4 mb-3">
                    <label>Nom du Cours</label>
                    <input type="text" class="form-control" name="nom_cour" value="{{ $presenceGroup->first()->nom_cour }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Niveau</label>
                    <select class="form-control" name="niveau" required>
                        @foreach(['L1', 'L2', 'L3'] as $niveau)
                            <option value="{{ $niveau }}" {{ $presenceGroup->first()->niveau === $niveau ? 'selected' : '' }}>{{ $niveau }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Heure du Cours</label>
                    <input type="text" class="form-control" name="heure_cour" value="{{ $presenceGroup->first()->heure_cour }}" required>
                </div>
            </div>
        </div>

        <!-- Liste des étudiants -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="h5 mb-0">Liste des Étudiants</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Type de Présence</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($presenceGroup as $presencel3)
                                <tr>
                                    <td>{{ $presencel3->etudiant->firstname }} {{ $presencel3->etudiant->lastname }}</td>
                                    <td>
                                        <select class="form-control" name="etudiants[{{ $presencel3->etudiant_id }}]" required>
                                            <option value="">Sélectionner</option>
                                            <option value="présent" {{ strtolower($presencel3->type_presence) === 'présent' ? 'selected' : '' }}>Présent</option>
                                            <option value="absent" {{ strtolower($presencel3->type_presence) === 'absent' ? 'selected' : '' }}>Absent</option>
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary w-100">💾 Mettre à jour les présences</button>
            </div>
        </div>
    </form>
</div>

<style>
    input, select {
        height: 35px;
        border-radius: 5px;
    }
    table th, table td {
        padding: 12px;
    }
</style>

@endsection
