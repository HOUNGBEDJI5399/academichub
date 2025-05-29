@extends('layouts.app3')

@section('content')


  <style>

.table-container {
            overflow-x: auto;
            background-color: var(--white);
            border-radius: 15px;
            box-shadow: var(--shadow);
        }
        
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .data-table th,
        .data-table td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .data-table th {
            background-color: rgba(67, 97, 238, 0.05);
            color: var(--dark);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }
        
        .data-table tr:last-child td {
            border-bottom: none;
        }
        
        .data-table tr:hover {
            background-color: rgba(67, 97, 238, 0.02);
        }
        
        .data-table td {
            color: var(--secondary);
            font-size: 0.95rem;
        }
        
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            display: inline-block;
        }
        
        .status-active {
            background-color: rgba(76, 201, 240, 0.15);
            color: var(--success);
        }
        
        .status-pending {
            background-color: rgba(252, 163, 17, 0.15);
            color: var(--warning);
        }
        
        .status-inactive {
            background-color: rgba(108, 117, 125, 0.15);
            color: var(--gray);
        }
        
        .action-cell {
            white-space: nowrap;
        }
        
        .action-btn {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            margin-right: 5px;
        }
        
        .edit-btn {
            background-color: rgba(76, 201, 240, 0.15);
            color: var(--success);
        }
        
        .view-btn {
            background-color: rgba(67, 97, 238, 0.15);
            color: var(--primary);
        }
        
        .delete-btn {
            background-color: rgba(247, 37, 133, 0.15);
            color: var(--danger);
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
        }
        
        .edit-btn:hover {
            background-color: var(--success);
            color: var(--white);
        }
        
        .view-btn:hover {
            background-color: var(--primary);
            color: var(--white);
        }
        
        .delete-btn:hover {
            background-color: var(--danger);
            color: var(--white);
        }
        
        .table-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background-color: var(--light);
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 0 0 15px 15px;
        }
        
        .table-info {
            color: var(--gray);
            font-size: 0.9rem;
        }
        
        .pagination {
            display: flex;
            gap: 5px;
        }
        
        .page-btn {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: var(--white);
            border: 1px solid rgba(0, 0, 0, 0.05);
            color: var(--gray);
            cursor: pointer;
            transition: var(--transition);
        }
        
        .page-btn.active {
            background-color: var(--primary);
            color: var(--white);
            border-color: var(--primary);
        }
        
        .page-btn:hover:not(.active) {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .data-table th,
            .data-table td {
                padding: 12px 15px;
            }
            
            .table-footer {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>

    <div class="course-table-container">
        <div class="table-header">
            <h2 class="table-title">Mes cours</h2>
            <div class="table-actions">
                <div class="search-box">
               
                </div>
              
            </div>
        </div>
        
        <div class="table-container">
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
                        <td>{{$cour->nom_cour}}</td>
                        <td>{{$cour->categorie}}</td>
                        <td>{{$cour->fichier}}</td>
                        <td>{{$cour->fichierType}}</td>
                    
                      

                        <td>
                            <a class="btn btn-primary" href="{{ route('professeurdashboard.couredit', $cour->id) }}" style="display: inline-block; text-decoration:none;">Éditer</a>
                    
                              <form action="{{ route('courdestroy', $cour->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button style="background-color: red; color:white;" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet cour ?');">Supprimer</button>
                            </form>
                          </td>
                    </tr>
                    <tr>  

                  @endforeach
                </tbody>
                    </table>
                </div>
                </div>
                     






























































@endsection