@extends('layouts.app1')

@section('content')
<style>
    /* Contenu principal */
    .main-content {
        flex-grow: 1;
        padding: 30px;
        background-color: var(--background-color);
        transition: all 0.3s ease;
        overflow-x: auto;
    }

    .sidebar.closed + .main-content {
        padding-left: 50px;
    }

    /* Header */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .header-title h1 {
        font-size: 2em;
        color: var(--primary-color);
    }

    .header-actions {
        display: flex;
        align-items: center;
    }

    .search-bar {
        position: relative;
        margin-right: 20px;
    }

    .search-bar input {
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 20px;
        width: 250px;
    }

    /* Tableau */
    .data-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-top: 30px;
        background-color: var(--white);
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .data-table th, .data-table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #f1f1f1;
    }

    .data-table th {
        background-color: #f8f9fa;
        color: var(--primary-color);
        font-weight: 600;
    }

    /* Boutons */
    .btn {
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 600;
        margin-right: 5px;
    }

    .btn-primary {
        background-color: var(--secondary-color);
        color: var(--white);
    }

    .btn-danger {
        background-color: #e74c3c;
        color: var(--white);
    }

    .btn-success {
        background-color: #2ecc71;
        color: var(--white);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .dashboard {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
            height: auto;
        }
    }
</style>

<div class="main-content">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- En-tête -->
    <div class="header">
        <div class="header-title">
            <h1>Gestion des inscriptions</h1>
        </div>
        <div class="header-actions">
            <div class="search-bar">
                <input type="text"   id="searchInput" placeholder="Rechercher un Etudiant..."  onkeyup="filtrerEtudiants()">
            </div>
            <button class="btn btn-primary">Recherche</button>
            <a href="{{ route('admindashboard.inscritcreate') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Ajouter un étudiant
            </a>
        </div>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Niveau</th>
                <th>Année Académique</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inscrits as $inscrit)
                
                     <tr class="etudiant-row">
                    <td >{{ $inscrit->matricule }}</td>
                    <td  class="nom-etudiant">{{ $inscrit->nom }}</td>
                    <td class="prenom-etudiant">{{ $inscrit->prenom }}</td>
                    <td class="email-etudiant">{{ $inscrit->email }}</td>
                    <td>{{ $inscrit->tel }}</td>
                    <td>{{ $inscrit->niveau }}</td>
                    <td>{{ $inscrit->annee }}</td>
                    <td>{{ $inscrit->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admindashboard.inscritedit', $inscrit->id) }}">Éditer</a>
                        
                        <form action="{{ route('inscritdestroy', $inscrit->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?');">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    
    function filtrerEtudiants() {
        const terme = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.getElementsByClassName('etudiant-row');

        for (let i = 0; i < rows.length; i++) {
            const nom = rows[i].querySelector('.nom-etudiant').textContent.toLowerCase();
            const prenom = rows[i].querySelector('.prenom-etudiant').textContent.toLowerCase();
            const email = rows[i].querySelector('.email-etudiant').textContent.toLowerCase();

            if (nom.includes(terme) || prenom.includes(terme) || email.includes(terme)) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }
</script>
@endsection
