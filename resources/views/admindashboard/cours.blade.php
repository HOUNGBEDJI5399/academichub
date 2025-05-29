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




 <!-- Contenu principal -->
 <div class="main-content">
    <!-- En-tête -->
    <div class="header">
        <div class="header-title">
            <h1>Gestion des cours</h1>
        </div>
        <div class="header-actions">
            <div class="search-bar">
                <input type="text" placeholder="Rechercher un cour..">
            </div>
            <button class="btn btn-primary">Recherche</button>
           
        </div>
    </div>

    
    <table class="data-table">
        <thead>
            <tr>
                <th>Nom du cour</th>
                <th>Categorie</th>
                <th>Fichier</th>
                <th>FichierType</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        
            @foreach ($cours as $cour)
            <tr>
                <td>{{ $cour->nom_cour }}</td>
                <td>{{ $cour->categorie }}</td>
                <td>{{ $cour->fichier }}</td>
                <td>{{ $cour->fichierType }}</td>
                <td>
                    @if ($cour->fichierPath)
                        <a href="{{ asset('storage/' . $cour->fichierPath) }}" target="_blank">
                            📄 Voir le fichier
                        </a>
                    @else
                        <span style="color: gray;">Aucun fichier</span>
                    @endif
                </td>
                <td>
                    <form action="{{ route('couradmindestroy', $cour->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button style="background-color: red; color:white;" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce cours ?');">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        
</div>
</div>



@endsection                                                         