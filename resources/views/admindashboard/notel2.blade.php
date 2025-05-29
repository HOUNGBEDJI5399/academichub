@extends('layouts.app1')

@section('title', 'Gestion des Notes')

@section('content')
<div class="main-content">
    <!-- En-tête -->
    <div class="header">
        <div class="header-title">
            <h1><i class="fas fa-chart-line"></i> Gestion des Notes</h1>
        </div>
        <div class="header-actions">
            <div class="search-bar">
                <form method="GET" action="{{ route('noteadmin') }}" id="searchForm">
                    <input id="searchInput" name="search" type="text" 
                           placeholder="Rechercher un étudiant..." 
                           value="{{ request('search') }}"
                           oninput="handleSearch()">
                    <i class="fas fa-search"></i>
                </form>
            </div>
            <a href="{{ route('admindashboard.notel2create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Ajouter Note
            </a>
        </div>
    </div>

    <!-- Messages de succès/erreur -->
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

    <div class="container">
        <h2><i class="fas fa-table"></i>  Notes  L2</h2>
        
   
      

        <div class="table-wrapper">
            <table id="notesTable">
                <thead>
                    <tr>
                        <th rowspan="3" class="student-name">Nom Étudiant</th>
                        <th colspan="9" class="ue-header">UE 1 </th>
                        <th colspan="9" class="ue-header">UE 2 </th>
                        <th colspan="9" class="ue-header">UE 3 </th>
                        <th colspan="9" class="ue-header">UE 4 </th>
                        <th colspan="9" class="ue-header">UE 5 </th>
                        <th rowspan="3" class="actions-header">Actions</th>
                    </tr>
                    <tr>
                        <!-- UE 1 -->
                        <th colspan="3" class="matiere-header">Matière 1</th>
                        <th colspan="3" class="matiere-header">Matière 2</th>
                        <th colspan="3" class="matiere-header">Matière 3</th>
                        <!-- UE 2 -->
                        <th colspan="3" class="matiere-header">Matière 1</th>
                        <th colspan="3" class="matiere-header">Matière 2</th>
                        <th colspan="3" class="matiere-header">Matière 3</th>
                        <!-- UE 3 -->
                        <th colspan="3" class="matiere-header">Matière 1</th>
                        <th colspan="3" class="matiere-header">Matière 2</th>
                        <th colspan="3" class="matiere-header">Matière 3</th>
                        <!-- UE 4 -->
                        <th colspan="3" class="matiere-header">Matière 1</th>
                        <th colspan="3" class="matiere-header">Matière 2/th>
                        <th colspan="3" class="matiere-header">Matière 3</th>
                        <!-- UE 5 -->
                        <th colspan="3" class="matiere-header"> Matière 1</th>
                        <th colspan="3" class="matiere-header"> Matière 2</th>
                        <th colspan="3" class="matiere-header"> Matière 3/th>
                    </tr>
                    <tr>
                        @for($ue = 1; $ue <= 5; $ue++)
                            @for($mat = 1; $mat <= 3; $mat++)
                                <th class="evaluation-header">Dev 1</th>
                                <th class="evaluation-header">Dev 2</th>
                                <th class="evaluation-header">Exam</th>
                            @endfor
                        @endfor
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @forelse ($notesl2 as $notel2)
                        <tr>
                            <td class="student-name nom-etudiant">
                                {{ $notel2->etudiant->firstname }} {{ $notel2->etudiant->lastname }}
                            </td>
                            @for ($ue = 1; $ue <= 5; $ue++)
                                @for ($mat = 1; $mat <= 3; $mat++)
                                    <td class="note-cell {{ getNoteClass($notel2->{"ue{$ue}_m{$mat}_dev1"}) }}">
                                        {{ $notel2->{"ue{$ue}_m{$mat}_dev1"} ?? '-' }}
                                    </td>
                                    <td class="note-cell {{ getNoteClass($notel2->{"ue{$ue}_m{$mat}_dev2"}) }}">
                                        {{ $notel2->{"ue{$ue}_m{$mat}_dev2"} ?? '-' }}
                                    </td>
                                    <td class="note-cell {{ getNoteClass($notel2->{"ue{$ue}_m{$mat}_exam"}) }}">
                                        {{ $notel2->{"ue{$ue}_m{$mat}_exam"} ?? '-' }}
                                    </td>
                                @endfor
                            @endfor
                            <td class="actions-cell">
                                <a href="{{ route('admindashboard.notel2edit', $notel2) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('notel2destroy', $notel2) }}" method="POST" 
                                      style="display: inline-block;" 
                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ces notes ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="47" class="empty-state">
                                <i class="fas fa-users-slash fa-3x"></i>
                                <h3>Aucune note d'étudiant trouvé</h3>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@php
function getNoteClass($note) {
    if ($note === null) return '';
    if ($note >= 16) return 'excellent';
    if ($note >= 12) return 'good';
    if ($note < 10) return 'poor';
    return '';
}
@endphp

<script>
let searchTimeout;

function handleSearch() {
    clearTimeout(searchTimeout);
    const loading = document.getElementById('loading');
    
    searchTimeout = setTimeout(function() {
        loading.classList.add('show');
        
        // Soumettre le formulaire après un délai
        setTimeout(function() {
            document.getElementById('searchForm').submit();
        }, 300);
    }, 500); // Attendre 500ms après que l'utilisateur arrête de taper
}

// Filtrage côté client pour une meilleure UX
function filtrerEtudiants() {
    const filtre = document.getElementById('searchInput').value.toLowerCase();
    const rows = document.querySelectorAll('#tableBody tr');
    let visibleCount = 0;

    rows.forEach(row => {
        const nomCell = row.querySelector('.nom-etudiant');
        if (nomCell) {
            const nom = nomCell.textContent.toLowerCase();
            const isVisible = nom.includes(filtre);
            row.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        }
    });

    // Gérer l'état vide
    const emptyState = document.querySelector('.empty-state');
    if (visibleCount === 0 && filtre.trim() !== '' && rows.length > 0) {
        if (!emptyState) {
            const tbody = document.getElementById('tableBody');
            const emptyRow = document.createElement('tr');
            emptyRow.innerHTML = `
                <td colspan="47" class="empty-state">
                    <i class="fas fa-users-slash fa-3x"></i>
                    <h3>Aucun étudiant trouvé</h3>
                    <p>Aucune donnée ne correspond à votre recherche.</p>
                </td>
            `;
            tbody.appendChild(emptyRow);
        }
    } else if (emptyState && visibleCount > 0) {
        emptyState.parentElement.style.display = 'none';
    }
}

// Auto-complétion et recherche en temps réel
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    
    // Ajouter un événement pour la recherche en temps réel côté client
    searchInput.addEventListener('input', function() {
        filtrerEtudiants();
    });
    
    // Masquer le loading au chargement
    document.getElementById('loading').classList.remove('show');
});
</script>

<style>
:root {
    --primary-color: #2c5aa0;
    --background-color: #f8f9fa;
    --success-color: #28a745;
    --danger-color: #dc3545;
    --border-color: #dee2e6;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.main-content {
    padding: 30px;
    background-color: var(--background-color);
    min-height: 100vh;
}

/* Header */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    flex-wrap: wrap;
    gap: 20px;
}

.header-title h1 {
    font-size: 2.2em;
    color: var(--primary-color);
    font-weight: 600;
}

.header-actions {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
}

.search-bar {
    position: relative;
}

.search-bar input {
    padding: 12px 45px 12px 15px;
    border: 2px solid var(--border-color);
    border-radius: 25px;
    width: 280px;
    font-size: 14px;
    transition: all 0.3s ease;
}

.search-bar input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(44, 90, 160, 0.1);
}

.search-bar i {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #6c757d;
    pointer-events: none;
}

.btn {
    padding: 12px 20px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.btn-sm {
    padding: 6px 12px;
    font-size: 12px;
}

.btn-primary {
    background-color: var(--primary-color);
    color: white;
}

.btn-primary:hover {
    background-color: #1e3d72;
    transform: translateY(-1px);
}

.btn-success {
    background-color: var(--success-color);
    color: white;
}

.btn-success:hover {
    background-color: #1e7e34;
    transform: translateY(-1px);
}

.btn-danger {
    background-color: var(--danger-color);
    color: white;
}

.btn-danger:hover {
    background-color: #c82333;
    transform: translateY(-1px);
}

.container {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    overflow-x: auto;
}

.container h2 {
    text-align: center;
    color: #333;
    margin-bottom: 25px;
    font-size: 1.8em;
    font-weight: 600;
}

.alert {
    padding: 12px 20px;
    margin-bottom: 20px;
    border-radius: 6px;
    border: 1px solid transparent;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

.table-wrapper {
    overflow-x: auto;
    border-radius: 8px;
    border: 1px solid var(--border-color);
}

table {
    border-collapse: collapse;
    width: max-content;
    min-width: 1200px;
    font-size: 13px;
    background: white;
}

th, td {
    border: 1px solid var(--border-color);
    padding: 8px 10px;
    text-align: center;
    white-space: nowrap;
}

th {
    background-color: #f8f9fa;
    font-weight: 600;
    color: #495057;
}

.student-name {
    position: sticky;
    left: 0;
    background: white !important;
    z-index: 3;
    text-align: left !important;
    font-weight: 500;
    color: var(--primary-color);
    min-width: 180px;
    max-width: 180px;
    box-shadow: 2px 0 5px rgba(0,0,0,0.1);
}

.actions-header, .actions-cell {
    position: sticky;
    right: 0;
    background: white !important;
    z-index: 3;
    box-shadow: -2px 0 5px rgba(0,0,0,0.1);
    min-width: 100px;
}

.ue-header {
    background-color: #e3f2fd !important;
    color: var(--primary-color);
    font-weight: bold;
}

.matiere-header {
    background-color: #f5f5f5 !important;
    color: #495057;
}

.evaluation-header {
    background-color: #fafafa !important;
    font-size: 11px;
    color: #6c757d;
}

tbody tr:nth-child(even) {
    background-color: #f8f9fa;
}

tbody tr:hover {
    background-color: #e8f4f8;
}

.note-cell {
    font-weight: 500;
}

.note-cell.excellent {
    background-color: #d4edda;
    color: #155724;
}

.note-cell.good {
    background-color: #fff3cd;
    color: #856404;
}

.note-cell.poor {
    background-color: #f8d7da;
    color: #721c24;
}

.empty-state {
    text-align: center;
    padding: 40px;
    color: #6c757d;
    font-style: italic;
}

.stats-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 1.5em;
    font-weight: bold;
    color: var(--primary-color);
}

.stat-label {
    font-size: 0.9em;
    color: #6c757d;
}

.loading {
    display: none;
    text-align: center;
    padding: 20px;
}

.loading.show {
    display: block;
}

@media screen and (max-width: 768px) {
    .main-content {
        padding: 15px;
    }

    .header {
        flex-direction: column;
        align-items: stretch;
    }

    .header-actions {
        justify-content: center;
    }

    .search-bar input {
        width: 100%;
        max-width: 300px;
    }

    table {
        font-size: 11px;
    }

    th, td {
        padding: 6px 8px;
    }

    .header-title h1 {
        font-size: 1.8em;
        text-align: center;
    }
}
</style>
@endsection