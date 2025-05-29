@extends('layouts.app1')

@section('content')



    <style>
        :root {
            --primary-color: #2c5aa0;
            --secondary-color: #3498db;
            --secondary-color: #3a0ca3;
            --accent-color: #4cc9f0;
            --success-color: #4CAF50;
            --warning-color: #ff9100;
            --danger-color: #f72585;
            --background-color: #f3f4f6;
            --white: #ffffff;
            --text-color: #333333;
            --dark-text: #1f2937;
            --light-text: #6b7280;
            --border-radius: 12px;
            --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', 'Roboto', sans-serif;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
        }

        .main-content {
            padding: 30px;
            background-color: var(--background-color);
            transition: var(--transition);
            overflow-x: hidden;
            min-height: 100vh;
            width: 100%;
            max-width: 100%;
        }

        /* Fix for sidebar issue */
        .app-container {
            display: flex;
            width: 100%;
        }

        .content-wrapper {
            width: 100%;
            flex-grow: 1;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header-title h1 {
            font-size: 2.2em;
            color: var(--primary-color);
            font-weight: 800;
            position: relative;
            margin-bottom: 5px;
        }

        .header-title h1::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 40px;
            height: 4px;
            background-color: var(--accent-color);
            border-radius: 2px;
        }

        .header-subtitle {
            color: var(--light-text);
            font-size: 1em;
            margin-top: 14px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .search-bar {
            position: relative;
        }

        .search-bar input {
            padding: 12px 20px 12px 45px;
            border: 2px solid #e5e7eb;
            border-radius: 25px;
            width: 280px;
            font-size: 1em;
            transition: var(--transition);
            background-color: var(--white);
        }

        .search-bar input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(var(--primary-color-rgb), 0.2);
        }

        .search-bar::before {
            content: '\f002';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--light-text);
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            font-size: 1em;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(var(--primary-color-rgb), 0.3);
        }

        /* Stats Cards */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 45px;
        }

        .dashboard-card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .dashboard-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background-color: var(--primary-color);
            opacity: 0;
            transition: var(--transition);
        }

        .dashboard-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 15px 25px rgba(0,0,0,0.18);
        }

        .dashboard-card:hover::before {
            opacity: 1;
        }

        .card-title {
            font-size: 1.1em;
            color: var(--light-text);
            margin-bottom: 20px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-icon {
            height: 36px;
            width: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(var(--primary-color-rgb), 0.1);
            border-radius: 12px;
            color: var(--primary-color);
        }

        .card-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .card-number {
            font-size: 2.5em;
            font-weight: 800;
            color: var(--dark-text);
            line-height: 1;
        }

        .card-trend {
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 600;
            font-size: 0.9em;
            padding: 6px 12px;
            border-radius: 20px;
        }

        .trend-up {
            background-color: rgba(76, 175, 80, 0.1);
            color: var(--success-color);
        }

        .trend-down {
            background-color: rgba(247, 37, 133, 0.1);
            color: var(--danger-color);
        }

        /* Welcome Section */
        .welcome-section {
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: var(--card-shadow);
            position: relative;
            overflow: hidden;
        }

        .welcome-section::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 250px;
            height: 250px;
            background-color: rgba(var(--primary-color-rgb), 0.03);
            border-radius: 50%;
            transform: translate(50%, -50%);
            z-index: 0;
        }

        .welcome-text {
            position: relative;
            z-index: 1;
        }

        .welcome-text h2 {
            color: var(--primary-color);
            font-size: 2.2em;
            margin-bottom: 20px;
            font-weight: 800;
            line-height: 1.2;
        }

        .welcome-text p {
            color: var(--light-text);
            font-size: 1.1em;
            max-width: 900px;
            line-height: 1.7;
        }

        /* Quick Actions */
        .section-title {
            margin-bottom: 25px;
            font-size: 1.5em;
            color: var(--dark-text);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--primary-color);
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .action-button {
            background-color: var(--white);
            border-radius: var(--border-radius);
            padding: 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            cursor: pointer;
        }

        .action-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0,0,0,0.15);
        }

        .action-icon {
            width: 70px;
            height: 70px;
            background-color: rgba(var(--primary-color-rgb), 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 1.8em;
            color: var(--primary-color);
            transition: var(--transition);
        }

        .action-button:hover .action-icon {
            background-color: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }

        .action-title {
            font-weight: 600;
            color: var(--dark-text);
            font-size: 1.1em;
        }

        .action-description {
            color: var(--light-text);
            text-align: center;
            margin-top: 8px;
            font-size: 0.9em;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .header-actions {
                width: 100%;
                flex-wrap: wrap;
            }
            
            .search-bar input {
                width: 100%;
            }
            
            .welcome-text p {
                max-width: 100%;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }
        }

        /* Ensure proper Blade template structure */
        .app-wrapper {
            display: flex;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="app-wrapper">
        <!-- Sidebar would be here in the app1 layout -->
        <div class="content-wrapper">
            <div class="main-content">
                <!-- Header -->
                <div class="header">
                    <div class="header-title">
                        <h1>Tableau de Bord</h1>
                        <div class="header-subtitle">Bienvenue sur votre espace d'administration</div>
                    </div>
                    <div class="header-actions">
                        <div class="search-bar">
                            <input type="text" placeholder="Rechercher...">
                        </div>
                        <button class="btn btn-primary">
                            <i class="fas fa-search"></i>
                            Rechercher
                        </button>
                    </div>
                </div>
                
                <!-- Stats Cards -->
                <div class="dashboard-grid">
                    <div class="dashboard-card">
                        <div class="card-title">
                            <div class="card-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            Utilisateurs
                        </div>
                        <div class="card-content">
                            <div class="card-number"></div>
                            <div class="card-trend trend-up">                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="dashboard-card">
                        <div class="card-title">
                            <div class="card-icon">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                            Annonces
                        </div>
                        <div class="card-content">
                            <div class="card-number"></div>
                            <div class="card-trend trend-down">
                            
                            </div>
                        </div>
                    </div>
                    
                    <div class="dashboard-card">
                        <div class="card-title">
                            <div class="card-icon">
                                <i class="fas fa-credit-card"></i>

                            </div>
                            Payement
                        </div>
                        <div class="card-content">
                            <div class="card-number"></div>
                            <div class="card-trend trend-up">
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Welcome Section -->
                <div class="welcome-section">
                    <div class="welcome-text">
                        <h2>Bienvenue sur ACADEMIC HUB</h2>
                        <p>Gérez facilement les étudiants, les cours, les annonces et toutes les ressources académiques depuis ce tableau de bord administrateur. Naviguez dans les différentes sections pour accéder aux fonctionnalités complètes de la plateforme et optimiser votre gestion académique.</p>
                    </div>
                </div>
               
                <!-- Quick Actions -->
                <div class="section-title">
                    <i class="fas fa-bolt"></i>
                  Quelques  Actions Rapides
                </div>
                
                <div class="quick-actions">

                    <div class="action-button">
                        <div class="action-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="action-title">Ajouter un utilisateur</div>
                        <div class="action-description"> <a  style="text-decoration: none"  href="{{route('admindashboard.usercreate')}}">Créer un nouveau compte étudiant ou enseignant</a></div>
                    </div>

                    <div class="action-button">
                        <div class="action-icon">
                            <i class="fas fa-running"></i>
                        </div>
                        <div class="action-title">Créer une activité</div>
                        <div class="action-description"><a style="text-decoration: none" href="{{route('admindashboard.activite')}}">Informer les utilisateurs des activité universitaire</a></div>
                    
                </div>
                 
                    
                    <div class="action-button">
                        <div class="action-icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="action-title">Créer une annonce</div>
                        <div class="action-description"><a style="text-decoration: none"   href="{{route('admindashboard.annonce')}}">Informer les utilisateurs de nouveautés</a></div>
                    </div>
                </div>


            </div>
        </div>
    </div>






    @endsection