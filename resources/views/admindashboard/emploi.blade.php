

@extends('layouts.app1')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    :root {
        --gradient-bg: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        --card-bg: #ffffff;
        --primary: #4f46e5;
        --primary-hover: #4338ca;
        --danger: #ef4444;
        --danger-hover: #dc2626;
        --text-primary: #1f2937;
        --text-secondary: #4b5563;
        --border-radius: 16px;
        --transition: all 0.3s ease;
        --shadow-sm: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        --shadow: 0 10px 30px rgba(0,0,0,0.1);
        --shadow-lg: 0 20px 40px rgba(0,0,0,0.15);
        --pause-color: #818cf8;
        --pause-bg: rgba(129, 140, 248, 0.1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

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

    body {
        font-family: 'Poppins', sans-serif;
        background: #f3f4f6;
        color: var(--text-primary);
        min-height: 100vh;
        padding: 20px 10px;
    }

    .page-container {
        max-width: 1100px; 
        margin: 0 auto;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
        position: relative;
    }

    .timetable-container {
        display: flex;
        flex-direction: column;
        gap: 30px; 
    }

    .timetable-card {
        background: var(--card-bg);
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        overflow: hidden;
        transition: var(--transition);
        transform: translateY(0);
    }

    .timetable-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .timetable-header {
        background: var(--gradient-bg);
        color: white;
        padding: 18px 25px; 
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .timetable-info h2 {
        font-size: 1.4rem;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .timetable-info .badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .timetable-class {
        background: rgba(255, 255, 255, 0.1);
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 0.95rem; 
        font-weight: 500;
    }

    .timetable-body {
        padding: 20px; 
    }

    .timetable {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: var(--shadow-sm);
        table-layout: fixed; 
    }

    .timetable th {
        background: #f9fafb;
        color: var(--text-primary);
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem; 
        letter-spacing: 1px;
        padding: 15px 10px; 
        border-bottom: 2px solid #e5e7eb;
        text-align: center;
    }

    .timetable th:first-child {
        border-top-left-radius: 12px;
        width: 100px; /
    }

    .timetable th:last-child {
        border-top-right-radius: 12px;
    }

    .timetable td {
        padding: 12px 8px;
        border-bottom: 1px solid #e5e7eb;
        text-align: center;
        font-size: 0.9rem;
        position: relative;
        transition: var(--transition);
        vertical-align: middle;
        word-break: break-word; 
        height: 60px;
    }

    .timetable td:hover {
        background-color: #f9fafb;
    }

    .time-col {
        background: #f3f4f6;
        font-weight: 600;
        color: var(--text-primary);
        width: 100px; 
        border-right: 2px solid #e5e7eb;
        padding: 8px !important; 
    }

    .pause-cell {
        background-color: var(--pause-bg);
        color: var(--pause-color);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.9rem;
    }

    .pause-cell i {
        margin-right: 8px;
    }

    .time-indicator {
        display: flex;
        align-items: center;
        justify-content: center; 
        gap: 4px; 
        font-size: 0.85rem; 
    }

    .time-indicator i {
        color: var(--primary);
        font-size: 0.9rem;
    }

    .day-highlight {
        font-size: 0.85rem;
        padding: 5px 3px;
    }

    @media (max-width: 768px) {
        .timetable-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px; /
        }
        
        .emplois h2 {
            font-size: 2.5rem;
        }
        
        .emplois {
            height: 150px;
            padding: 20px;
        }
        
        .timetable-container {
            gap: 20px;
        }
        
       
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        
        .timetable th, .timetable td {
            padding: 8px 5px;
            font-size: 0.8rem;
        }
        
        .time-col {
            width: 80px; 
        }
        
        .time-indicator {
            font-size: 0.75rem;
        }
        
        .time-indicator i {
            font-size: 0.8rem;
        }
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-in {
        animation: fadeIn 0.5s ease forwards;
    }

    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    .delay-3 { animation-delay: 0.3s; }
    .delay-4 { animation-delay: 0.4s; }
</style>
</head>
<body>


 <div class="main-content">
    <div class="header">
        <div class="header-title">
            <h1>Gestion emploi du temp</h1>
        </div>
        <div class="header-actions">
            <div class="search-bar">
                <input type="text" placeholder="Rechercher un emploi..">
            </div>
            <button class="btn btn-primary">Recherche</button>
            <button class="btn btn-success" >
                <i class="fas fa-plus"></i><a style="text-decoration:none; color:white;" href="{{route('admindashboard.emploicreate')}}">créer un emploi</a>
            </button>
        </div>
    </div>


    <div class="page-container">
        <div class="header animate-in">
        </div>

        <div class="timetable-container">
            @foreach ($emplois as $emploi)
            <div class="timetable-card animate-in delay-1">
                <div class="timetable-header">
                    <div class="timetable-info">
                        <h2>{{ $emploi->annee }}</h2>
                        <span class="badge">{{ $emploi->semaine }}</span>
                    </div>
                    <div class="timetable-class">
                        <i class="fas fa-users"></i> {{ $emploi->classe }}
                    </div>
                </div>

                <div class="timetable-body">
                    <div class="table-responsive">
                        <table class="timetable animate-in delay-2">
                            <thead>
                                <tr>
                                    <th>Horaire</th>
                                    <th>Lundi</th>
                                    <th>Mardi</th>
                                    <th>Mercredi</th>
                                    <th>Jeudi</th>
                                    <th>Vendredi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="time-col">
                                        <div class="time-indicator">
                                            <i class="far fa-clock"></i> 8h - 9h
                                        </div>
                                    </td>
                                    <td class="day-highlight">{{ $emploi->lundi_8h }}</td>
                                    <td class="day-highlight">{{ $emploi->mardi_8h }}</td>
                                    <td class="day-highlight">{{ $emploi->mercredi_8h }}</td>
                                    <td class="day-highlight">{{ $emploi->jeudi_8h }}</td>
                                    <td class="day-highlight">{{ $emploi->vendredi_8h }}</td>
                                </tr>
                                <tr>
                                    <td class="time-col">
                                        <div class="time-indicator">
                                            <i class="far fa-clock"></i> 9h - 10h
                                        </div>
                                    </td>
                                    <td class="day-highlight">{{ $emploi->lundi_9h }}</td>
                                    <td class="day-highlight">{{ $emploi->mardi_9h }}</td>
                                    <td class="day-highlight">{{ $emploi->mercredi_9h }}</td>
                                    <td class="day-highlight">{{ $emploi->jeudi_9h }}</td>
                                    <td class="day-highlight">{{ $emploi->vendredi_9h }}</td>
                                </tr>
                                <tr>
                                    <td class="time-col">
                                        <div class="time-indicator">
                                            <i class="far fa-clock"></i> 10h - 11h
                                        </div>
                                    </td>
                                    <td class="day-highlight">{{ $emploi->lundi_10h }}</td>
                                    <td class="day-highlight">{{ $emploi->mardi_10h }}</td>
                                    <td class="day-highlight">{{ $emploi->mercredi_10h }}</td>
                                    <td class="day-highlight">{{ $emploi->jeudi_10h }}</td>
                                    <td class="day-highlight">{{ $emploi->vendredi_10h }}</td>
                                </tr>
                                <tr>
                                    <td class="time-col">
                                        <div class="time-indicator">
                                            <i class="far fa-clock"></i> 11h - 12h
                                        </div>
                                    </td>
                                    <td class="day-highlight">{{ $emploi->lundi_11h }}</td>
                                    <td class="day-highlight">{{ $emploi->mardi_11h }}</td>
                                    <td class="day-highlight">{{ $emploi->mercredi_11h }}</td>
                                    <td class="day-highlight">{{ $emploi->jeudi_11h }}</td>
                                    <td class="day-highlight">{{ $emploi->vendredi_11h }}</td>
                                </tr>
                                <tr>
                                    <td class="time-col">
                                        <div class="time-indicator">
                                            <i class="far fa-clock"></i> 12h - 13h
                                        </div>
                                    </td>
                                    <td colspan="5" class="pause-cell">
                                        <i class="fas fa-utensils"></i> Pause Déjeuner
                                    </td>
                                </tr>
                                <tr>
                                    <td class="time-col">
                                        <div class="time-indicator">
                                            <i class="far fa-clock"></i> 13h - 14h
                                        </div>
                                    </td>
                                    <td class="day-highlight">{{ $emploi->lundi_13h }}</td>
                                    <td class="day-highlight">{{ $emploi->mardi_13h }}</td>
                                    <td class="day-highlight">{{ $emploi->mercredi_13h }}</td>
                                    <td class="day-highlight">{{ $emploi->jeudi_13h }}</td>
                                    <td class="day-highlight">{{ $emploi->vendredi_13h }}</td>
                                </tr>
                                <tr>
                                    <td class="time-col">
                                        <div class="time-indicator">
                                            <i class="far fa-clock"></i> 14h - 15h
                                        </div>
                                    </td>
                                    <td class="day-highlight">{{ $emploi->lundi_14h }}</td>
                                    <td class="day-highlight">{{ $emploi->mardi_14h }}</td>
                                    <td class="day-highlight">{{ $emploi->mercredi_14h }}</td>
                                    <td class="day-highlight">{{ $emploi->jeudi_14h }}</td>
                                    <td class="day-highlight">{{ $emploi->vendredi_14h }}</td>
                                </tr>
                                <tr>
                                    <td class="time-col">
                                        <div class="time-indicator">
                                            <i class="far fa-clock"></i> 15h - 16h
                                        </div>
                                    </td>
                                    <td class="day-highlight">{{ $emploi->lundi_15h }}</td>
                                    <td class="day-highlight">{{ $emploi->mardi_15h }}</td>
                                    <td class="day-highlight">{{ $emploi->mercredi_15h }}</td>
                                    <td class="day-highlight">{{ $emploi->jeudi_15h }}</td>
                                    <td class="day-highlight">{{ $emploi->vendredi_15h }}</td>
                                </tr>
                                <tr>
                                    <td class="time-col">
                                        <div class="time-indicator">
                                            <i class="far fa-clock"></i> 16h - 17h
                                        </div>
                                    </td>
                                    <td class="day-highlight">{{ $emploi->lundi_16h }}</td>
                                    <td class="day-highlight">{{ $emploi->mardi_16h }}</td>
                                    <td class="day-highlight">{{ $emploi->mercredi_16h }}</td>
                                    <td class="day-highlight">{{ $emploi->jeudi_16h }}</td>
                                    <td class="day-highlight">{{ $emploi->vendredi_16h }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                     <div class="action-buttons animate-in delay-3">
                        <a href="{{route('admindashboard.emploiedit' , $emploi)}}" class="btn btn-edit">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                        <form action="{{route('emploidestroy' , $emploi)}}" method="POST" onsubmit="return confirm('Es-tu sûr de vouloir supprimer cet emploi du temps ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">
                                <i class="fas fa-trash-alt"></i> Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        // Simple animation for entrance
        document.addEventListener('DOMContentLoaded', function() {
            const animatedElements = document.querySelectorAll('.animate-in');
            animatedElements.forEach(function(element) {
                element.style.opacity = '0';
            });
            
            setTimeout(function() {
                animatedElements.forEach(function(element) {
                    element.style.opacity = '1';
                });
            }, 100);
        });
    </script>
</body>
@endsection