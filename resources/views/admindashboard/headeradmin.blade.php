<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'ACADEMIC HUB') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for additional icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
      
    <style>
        :root {
           --primary-color: #2c5aa0;
            --secondary-color: #3498db;
            --background-color: #ecf0f1;
            --text-color: #333;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background-color: var(--primary-color);
            color: var(--white);
            padding: 30px 20px;
            transition: width 0.3s ease, transform 0.3s ease;
            position: relative;
            z-index: 10;
        }

        .sidebar.closed {
            width: 80px;
            overflow: hidden;
        }

        .sidebar-toggle {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255,255,255,0.1);
            color: var(--white);
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            z-index: 20;
        }

        .sidebar-logo {
            text-align: center;
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 40px;
            color: var(--white);
            letter-spacing: 2px;
            transition: opacity 0.3s ease;
        }

        .sidebar.closed .sidebar-logo {
            opacity: 0;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 10px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .sidebar.closed .sidebar-menu a {
            justify-content: center;
            padding: 12px;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: rgba(255,255,255,0.1);
            color: var(--white);
        }

        .sidebar-menu a i {
            margin-right: 15px;
            font-size: 1.2em;
            min-width: 25px;
            text-align: center;
        }

        .sidebar.closed .sidebar-menu a span {
            display: none;
        }

        .sidebar.closed .sidebar-menu a i {
            margin-right: 0;
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


        @media (max-width: 1024px) {
            .dashboard {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                height: auto;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        </style>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>

    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <button class="sidebar-toggle" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <div class="sidebar-logo">Admin <br>ACADEMIC HUB</div>
            <ul class="sidebar-menu">
                <li><a href="#" class="active">
                    <i class="fas fa-home"></i>
                    <span>Tableau de Bord</span>
                </a></li>
                <li><a href="{{route('admindashboard.users')}}">
                    <i class="fas fa-users"></i>
                    <span>Utilisateurs</span>
                </a></li>


                    <li><a href="{{route('admindashboard.inscrit')}}">
                        <i class="fas fa-user-plus"></i>
                    <span>Inscriptions étudiant </span>
                </a></li>
                 
                
                <li><a href="{{route('admindashboard.cours')}}">
                    <i class="fas fa-book"></i>
                    <span>Cours </span>
                </a></li>

                <li><a href="{{route('admindashboard.emploi')}}">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Emploi </span>
                </a></li>
                
                <li><a href="{{route('admindashboard.ue')}}">
                    <i class="fas fa-graduation-cap"></i>
                    <span>UE</span>
                </a></li>
                <li><a href="{{route('admindashboard.matiere')}}">
                    <i class="fas fa-book"></i>
                    <span>Matières</span>
                </a></li>
                <li><a href="{{route('admindashboard.club')}}">
                    <i class="fas fa-flag"></i>
                    <span>Clubs</span>
                </a></li>

                <li class="dropdown">
    <a href="" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fas fa-clipboard"></i>
        <span>Notes </span>
        <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
      
        <li><a style="color: blue;" href="{{route('admindashboard.note')}}">Notes L1</a></li>
        <li><a style="color: blue;" href="{{route('admindashboard.notel2')}}">Notes L2</a></li>
       
        <li><a style="color: blue;"  href="{{route('admindashboard.notel3')}}">Notes L3</a></li>

    </ul>
</li>

                <li><a href="{{route('admindashboard.annonce')}}">
                    <i class="fas fa-bullhorn"></i>
                    <span>Annonces</span>
                </a></li>
                <li><a href="{{route('admindashboard.activite')}}">
                    <i class="fas fa-running"></i>
                    <span>Activités</span>
                </a></li>
                  <li><a href="{{route('admindashboard.presence')}}">
                     <i class="fas fa-clipboard-list"> </i></i>
                    <span>Feuille Presence L1</span>
                </a></li>
                  <li><a href="{{route('admindashboard.presencel2')}}">
                <i class="fas fa-clipboard-list"> </i></i>

                    <span>Feuille Presence L2</span>
                </a></li>
                  <li><a href="{{route('admindashboard.presencel3')}}">
                <i class="fas fa-clipboard-list"> </i></i>

                    <span>Feuille Presence L3</span>
                </a></li>

                <li><a href="#">
                    <i class="fas fa-credit-card"></i>
                    <span>Payement</span>
                </a></li><br>
                   
                @auth
                <li style="margin-left: 22px; "  class="nav-item dropdown">
                    <a style="background-color: #3498db; color:white; "  id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->firstname }}  {{ Auth::user()->lastname }}  
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a style="color: #3498db;"class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                    </ul>
                         
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @endauth
                 
            
            </ul>
        </div>

        



        <!-- Bootstrap JS and dependencies -->
        <script src="{{asset('js/main.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
    </html>