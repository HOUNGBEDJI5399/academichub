<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for additional icons -->
    <style>
        :root {
            --primary-color: #09aded;
            --secondary-color: #0a7bbd;
            --text-color: #333;
            --light-background: #f4f7f9;
        }

        body {
            font-family: 'Arial', sans-serif;
            color: var(--text-color);
            background-color: var(--light-background);
        }

        .navbar {
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: bold;
            color: var(--primary-color) !important;
            font-size: 1.8rem;
            letter-spacing: 1px;
        }

        .nav-link {
            position: relative;
            margin-right: 15px;
            color: var(--primary-color) !important;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .nav-link:hover {
            background-color: var(--primary-color) !important;
            color: white !important;
            border-radius: 8px;
        }

        .btn-schoolpay {
            background-color: var(--primary-color) !important;
            border: none;
            color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-schoolpay:hover {
            background-color: var(--primary-color) ;
            transform: translateY(-3px);
            color: white;
        }

        /* Animation for dropdown */
        .dropdown-menu {
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .dropdown-menu.show {
            display: block;
            opacity: 1;
        }

        /* Hover effect on dropdown items */
        .dropdown-item:hover {
            background-color: var(--primary-color);
            color: white;
        }


  .no-hover-bg {
    color: black !important;
    background-color: transparent !important;
      }

  .no-hover-bg:hover {
    background-color: transparent !important;
    color:  #09aded !important;
    }
 

    </style>
</head>
<body>
    <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container-fluid px-4">
        <a class="navbar-brand" href="#">ACADEMIC HUB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('etudiantdashboard.acceuil')}}">ACCUEIL</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        COURS
                    </a>
                    <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="{{route('etudiantdashboard.cour')}}">Cour</a></li>
                        <li><a class="dropdown-item" href="{{route('etudiantdashboard.courl1')}}">Licence 1</a></li>
                        <li><a class="dropdown-item" href="{{route('etudiantdashboard.courl2')}}">Licence 2</a></li>
                        <li><a class="dropdown-item" href="{{route('etudiantdashboard.courl3')}}">Licence 3</a></li>
                    </ul>
                </li>
                 
             <li class="nav-item"><a class="nav-link" href="{{route('etudiantdashboard.emploi')}}">Emploi</a></li>

                <li class="nav-item"><a class="nav-link" href="{{route('etudiantdashboard.activite')}}">ACTIVITÉS</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('etudiantdashboard.annonce')}}">ANNONCES</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('etudiantdashboard.club')}}">CLUBS</a></li>

                <li class="nav-item">
                    <a style="color: white" class="btn btn-schoolpay" href="{{route('etudiantdashboard.schoolpay')}}">SCHOOLPAY</a>
                </li>

                @auth
                    <li   class="nav-item dropdown">
                        <a  style="color: #09aded;"  id="navbarDropdown" class="nav-link dropdown-toggle no-hover-bg" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a  class="dropdown-item" href="{{ route('logout') }}"
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
    </div>
</nav>

    

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Bootstrap 5: show dropdown on hover (optional)
        document.querySelectorAll('.nav-item.dropdown').forEach(function (dropdown) {
            dropdown.addEventListener('mouseenter', function () {
                dropdown.querySelector('.dropdown-menu').classList.add('show');
            });
            dropdown.addEventListener('mouseleave', function () {
                dropdown.querySelector('.dropdown-menu').classList.remove('show');
            });
        });
    </script>
</body>
</html>
