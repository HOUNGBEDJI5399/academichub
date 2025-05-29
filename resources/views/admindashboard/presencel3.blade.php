@extends('layouts.app2')

@section('content')
<style>
    body {
        font-family: 'Montserrat', 'Roboto', sans-serif;
        font-size: 14px;
        background-color: #f8f9fa;
        color: #333;
    }
    
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    
    .header {
        text-align: center;
        margin-bottom: 40px;
        padding: 25px 0;
        background: linear-gradient(135deg, #3a7bd5, #2c5282);
        color: white;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .header h1 {
        margin: 0;
        font-size: 2.5rem;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
    }
    
    .presence-sheet {
        margin-bottom: 50px;
        padding: 25px;
        border-radius: 12px;
        background-color: white;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease;
    }
    
    .presence-sheet:hover {
        transform: translateY(-5px);
    }
    
    .course-info {
        margin-bottom: 20px;
        padding: 15px;
        background-color: #f0f7ff;
        border-left: 5px solid #3a7bd5;
        border-radius: 5px;
    }
    
    .course-info p {
        margin: 10px 0;
        font-size: 16px;
    }
    
    .course-info strong {
        color: #2c5282;
        font-weight: 600;
    }
    
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-top: 20px;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }
    
    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #eaeaea;
    }
    
    th {
        background-color: #3a7bd5;
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 0.5px;
    }
    
    tr:nth-child(even) {
        background-color: #f9fafc;
    }
    
    tr:hover {
        background-color: #f0f7ff;
    }
    
    .present {
        color: #38a169;
        font-weight: 600;
        background-color: rgba(56, 161, 105, 0.1);
        padding: 5px 10px;
        border-radius: 20px;
        display: inline-block;
    }
    
    .absent {
        color: #e53e3e;
        font-weight: 600;
        background-color: rgba(229, 62, 62, 0.1);
        padding: 5px 10px;
        border-radius: 20px;
        display: inline-block;
    }
    
    .footer {
        margin-top: 25px;
        text-align: center;
        padding: 15px;
        color: #718096;
        border-top: 1px solid #eaeaea;
        font-style: italic;
    }
    
    .actions {
        margin-top: 20px;
        margin-bottom: 20px;
        display: flex;
        justify-content: flex-end;
    }
    
    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-danger {
        background-color: #e53e3e;
        color: white;
    }
    
    .btn-danger:hover {
        background-color: #c53030;
        box-shadow: 0 4px 6px rgba(229, 62, 62, 0.2);
    }
    
    .empty-state {
        text-align: center;
        padding: 50px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }
    
    .empty-state p {
        font-size: 18px;
        color: #718096;
    }
    
    /* Responsive design */
    @media (max-width: 768px) {
        .header h1 {
            font-size: 1.8rem;
        }
        
        .course-info p {
            font-size: 14px;
        }
        
        th, td {
            padding: 10px;
        }
    }
</style>

<div class="header">
    <h1>Feuilles de Présence</h1>
</div>

@if ($presencesl3->count() > 0)
    @php
        $groupedPresences = $presencesl3->groupBy(function($presencel3) {
            return $presencel3->nom_cour . '_' . $presencel3->niveau . '_' . $presencel3->heure_cour . '_' . $presencel3->created_at->format('Y-m-d');
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
                <form action="{{ route('adminpresencel3destroy', $first) }}" method="POST" style="display: inline;">
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
                    
                    @foreach($group as $index => $presencel3)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                {{ $presencel3->etudiant ? $presencel3->etudiant->firstname . ' ' . $presencel3->etudiant->lastname : 'Inconnu' }}
                            </td>
                             <td>
                        @php
                            $statusClass = '';
                            if (strtolower($presencel3->type_presence) === 'presentiel') {
                                $statusClass = 'present';
                            } elseif (strtolower($presencel3->type_presence) === 'absent') {
                                $statusClass = 'absent';
                            }
                        @endphp
                        <span class="{{ $statusClass }}">{{ ucfirst($presencel3->type_presence) }}</span>
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
