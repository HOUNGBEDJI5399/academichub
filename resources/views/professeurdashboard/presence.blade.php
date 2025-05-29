
@extends('layouts.app3')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
    }
    .header {
        text-align: center;
        margin-bottom: 40px;
    }
    .presence-sheet {
        margin-bottom: 50px;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #fafafa;
    }
    .course-info {
        margin-bottom: 10px;
        padding: 10px;
        background-color: #f5f5f5;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    .present {
        color: green;
        font-weight: bold;
    }
    .absent {
        color: red;
        font-weight: bold;
    }
    .footer {
        margin-top: 15px;
        text-align: center;
        font-size: 10px;
        color: #666;
    }
    .actions {
        margin-top: 10px;
    }
</style>

<div class="header">
    <h1>Feuilles de Présence</h1>
</div>

@if ($presences->count() > 0)
    @php
        $groupedPresences = $presences->groupBy(function($presence) {
            return $presence->nom_cour . '_' . $presence->niveau . '_' . $presence->heure_cour . '_' . $presence->created_at->format('Y-m-d');
        });
    @endphp

    @foreach($groupedPresences as $key => $group)
        @php $first = $group->first(); @endphp

        <div class="presence-sheet">
            <div class="course-info">
                <p><strong>Date:</strong> {{ $first->created_at->format('Y-m-d') }}</p>
                <p><strong>Cours:</strong> {{ $first->nom_cour }}</p>
                <p><strong>Niveau:</strong> {{ $first->niveau }}</p>
                <p><strong>Heure:</strong> {{ $first->heure_cour }}</p>
            </div>

            <div class="actions">
                <a class="btn btn-primary" href="{{ route('professeurdashboard.presenceedit', $first) }}">Éditer</a>
      <form action="{{ route('presencedestroy', $first) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Supprimer cette feuille ?')">Supprimer</button>
                </form>

            </div>

            <table>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nom de l'étudiant</th>
                        <th>Statut de présence</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($group as $index => $presence)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                {{ $presence->etudiant ? $presence->etudiant->firstname . ' ' . $presence->etudiant->lastname : 'Inconnu' }}
                            </td>
                             <td>
                        @php
                            $statusClass = '';
                            if (strtolower($presence->type_presence) === 'presentiel') {
                                $statusClass = 'present';
                            } elseif (strtolower($presence->type_presence) === 'absent') {
                                $statusClass = 'absent';
                            }
                        @endphp
                        <span class="{{ $statusClass }}">{{ ucfirst($presence->type_presence) }}</span>
                    </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="footer">
                <p>Document généré le {{ $first->created_at->format('Y-m-d') }}</p>
            </div>
        </div>
    @endforeach

@else
    <p>Aucune présence trouvée.</p>
@endif
@endsection
