<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --primary-dark: #3a0ca3;
            --secondary: #2b2d42;
            --success: #4cc9f0;
            --danger: #f72585;
            --warning: #fca311;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --white: #ffffff;
            --shadow: 0 10px 15px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color: #f5f7ff;
            color: var(--dark);
            line-height: 1.6;
        }
        
        .dashboard {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            width: 280px;
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--secondary) 100%);
            color: var(--white);
            transition: var(--transition);
            box-shadow: var(--shadow);
            z-index: 10;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }
        
        .sidebar-header {
            padding: 25px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-header h2 {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }
        
        .sidebar-header i {
            color: var(--primary-light);
            font-size: 2rem;
        }
        
        .professor-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 25px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(0, 0, 0, 0.1);
        }
        
        .professor-avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background-color: var(--primary-light);
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            border: 4px solid rgba(255, 255, 255, 0.3);
            position: relative;
        }
        
        .professor-avatar::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent 50%, rgba(255, 255, 255, 0.1) 50%);
        }
        
        .professor-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .professor-name {
            font-weight: 600;
            font-size: 1.2rem;
            color: var(--white);
            margin-bottom: 5px;
        }
        
        .professor-title {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
            background: rgba(67, 97, 238, 0.3);
            padding: 3px 12px;
            border-radius: 20px;
        }
        
        .sidebar-menu {
            padding: 20px 0;
        }
        
        .menu-section {
            padding: 0 20px;
            margin-bottom: 10px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }
        
        .menu-item {
            padding: 12px 25px;
            display: flex;
            align-items: center;
            gap: 15px;
            cursor: pointer;
            transition: var(--transition);
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            border-left: 4px solid transparent;
            position: relative;
            margin: 2px 0;
        }
        
        .menu-item:hover, .menu-item.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--white);
            border-left-color: var(--primary-light);
        }
        
        .menu-item.active::before {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 5px;
            height: 30px;
            background-color: var(--primary-light);
            border-radius: 5px 0 0 5px;
        }
        
        .menu-item i {
            font-size: 1.2rem;
            width: 24px;
            text-align: center;
            color: var(--primary-light);
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            transition: var(--transition);
            min-height: calc(100vh - 60px);
            display: flex;
            flex-direction: column;
        }
        
        .topbar {
            background-color: var(--white);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 5;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .topbar-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .menu-toggle {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--dark);
            display: none;
            transition: var(--transition);
        }
        
        .menu-toggle:hover {
            color: var(--primary);
            transform: scale(1.1);
        }
        
        .topbar-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            position: relative;
        }
        
        .topbar-title::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 40px;
            height: 3px;
            background-color: var(--primary);
            border-radius: 3px;
        }
        
        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .topbar-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--gray);
            font-size: 1.2rem;
            transition: var(--transition);
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .topbar-btn:hover {
            color: var(--primary);
            background-color: rgba(67, 97, 238, 0.1);
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--danger);
            color: var(--white);
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        
        .content-wrapper {
            padding: 30px;
            flex: 1;
        }
        
        .content-header {
            margin-bottom: 30px;
            position: relative;
        }
        
        .content-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        .content-title::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary);
            border-radius: 3px;
        }
        
        .breadcrumb {
            list-style: none;
            display: flex;
            gap: 8px;
            font-size: 0.9rem;
            align-items: center;
        }
        
        .breadcrumb li:not(:last-child)::after {
            content: "/";
            margin-left: 8px;
            color: var(--gray);
        }
        
        .breadcrumb a {
            color: var(--primary);
            text-decoration: none;
            transition: var(--transition);
        }
        
        .breadcrumb a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        .breadcrumb .active {
            color: var(--gray);
        }
        
        /* Stats Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }
        
        .stat-card {
            background: var(--white);
            border-radius: 15px;
            padding: 25px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::after {
            content: '';
            position: absolute;
            width: 100px;
            height: 100px;
            background: rgba(67, 97, 238, 0.05);
            border-radius: 50%;
            bottom: -50px;
            right: -50px;
            z-index: 0;
        }
        
        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.8rem;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }
        
        .stat-blue {
            background: linear-gradient(135deg, #4361ee 0%, #4895ef 100%);
            color: var(--white);
        }
        
        .stat-green {
            background: linear-gradient(135deg, #06d6a0 0%, #4cc9f0 100%);
            color: var(--white);
        }
        
        .stat-orange {
            background: linear-gradient(135deg, #fca311 0%, #ffba08 100%);
            color: var(--white);
        }
        
        .stat-red {
            background: linear-gradient(135deg, #f72585 0%, #ff4d6d 100%);
            color: var(--white);
        }
        
        .stat-info {
            flex: 1;
            position: relative;
            z-index: 1;
        }
        
        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 0.95rem;
            color: var(--gray);
            font-weight: 500;
        }
        
        /* Course Table Container */
        .course-table-container {
            background-color: var(--white);
            border-radius: 15px;
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 30px;
        }
        
        .table-header {
            padding: 20px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            background-color: #f8f9fa;
        }
        
        .table-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--dark);
        }
        
        .table-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        
        .search-box {
            position: relative;
            width: 250px;
        }
        
        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }
        
        .search-input {
            width: 100%;
            padding: 10px 15px 10px 40px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 30px;
            font-size: 0.9rem;
            transition: var(--transition);
        }
        
        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-weight: 500;
            border-radius: 30px;
            cursor: pointer;
            transition: var(--transition);
            text-align: center;
            border: none;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: var(--white);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn-primary:hover {
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.4);
            transform: translateY(-2px);
        }
        
        /* Card Cours Styling */
        .container.py-4 {
            padding: 25px !important;
        }
        
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: -12px;
        }
        
        .col {
            padding: 12px;
            flex: 0 0 50%;
            max-width: 50%;
        }
        
        .card {
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: var(--transition);
            border: none;
            height: 100%;
        }
        
        .card-cours {
            position: relative;
        }
        
        .card-cours::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary), var(--primary-light));
            border-radius: 5px 0 0 5px;
        }
        
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            padding: 20px 25px;
            background-color: rgba(67, 97, 238, 0.05);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-dark);
        }
        
        .card-body {
            padding: 25px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .card-body p {
            margin-bottom: 15px;
        }
        
        .card-body p strong {
            color: var(--dark);
            font-weight: 600;
        }
        
        .btn-edit, .btn-delete {
            padding: 8px 16px;
            border-radius: 30px;
            font-size: 0.85rem;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .btn-edit {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success);
            border: 1px solid rgba(76, 201, 240, 0.3);
        }
        
        .btn-delete {
            background-color: rgba(247, 37, 133, 0.1);
            color: var(--danger);
            border: 1px solid rgba(247, 37, 133, 0.3);
        }
        
        .btn-edit:hover {
            background-color: var(--success);
            color: var(--white);
            border-color: var(--success);
        }
        
        .btn-delete:hover {
            background-color: var(--danger);
            color: var(--white);
            border-color: var(--danger);
        }
        
        .alert {
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 20px;
        }
        
        .alert-info {
            background-color: rgba(76, 201, 240, 0.1);
            border: 1px solid rgba(76, 201, 240, 0.3);
            color: var(--success);
        }
        
        /* Footer */
        .dashboard-footer {
            background-color: var(--white);
            padding: 25px 30px;
            text-align: center;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.05);
            position: relative;
            z-index: 1;
        }
        
        .footer-content {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-bottom: 20px;
        }
        
        .footer-column h4 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--dark);
            position: relative;
            display: inline-block;
        }
        
        .footer-column h4::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 30px;
            height: 2px;
            background-color: var(--primary);
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 8px;
        }
        
        .footer-links a {
            color: var(--gray);
            text-decoration: none;
            transition: var(--transition);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .footer-links a:hover {
            color: var(--primary);
            transform: translateX(5px);
        }
        
        .footer-bottom {
            padding-top: 20px;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            font-size: 0.9rem;
            color: var(--gray);
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 15px;
        }
        
        .social-link {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: rgba(67, 97, 238, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--primary);
            transition: var(--transition);
        }
        
        .social-link:hover {
            background-color: var(--primary);
            color: var(--white);
            transform: translateY(-3px);
        }
        
        /* Quick Action Floating Button */
        .quick-action {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 100;
        }
        
        .action-button {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: var(--white);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5rem;
            box-shadow: 0 5px 20px rgba(67, 97, 238, 0.4);
            cursor: pointer;
            transition: var(--transition);
            border: none;
        }
        
        .action-button:hover {
            transform: translateY(-5px) rotate(90deg);
            box-shadow: 0 10px 25px rgba(67, 97, 238, 0.5);
        }
        
        /* Responsive design */
        @media (max-width: 1200px) {
            .stats-container {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
        }
        
        @media (max-width: 992px) {
            .sidebar {
                width: 70px;
                transform: translateX(0);
            }
            
            .sidebar-header h2 span,
            .professor-info,
            .menu-item span,
            .menu-section {
                display: none;
            }
            
            .menu-item {
                justify-content: center;
                padding: 15px;
            }
            
            .main-content {
                margin-left: 70px;
            }
            
            .sidebar.expanded {
                width: 280px;
            }
            
            .sidebar.expanded .sidebar-header h2 span,
            .sidebar.expanded .professor-info,
            .sidebar.expanded .menu-item span,
            .sidebar.expanded .menu-section {
                display: block;
            }
            
            .sidebar.expanded .menu-item {
                justify-content: flex-start;
                padding: 12px 25px;
            }
            
            .col {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-70px);
                position: fixed;
                z-index: 20;
            }
            
            .sidebar.expanded {
                transform: translateX(0);
                width: 280px;
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .menu-toggle {
                display: block;
            }
            
            .footer-content {
                flex-direction: column;
                gap: 25px;
                text-align: center;
            }
            
            .footer-column h4::after {
                left: 50%;
                transform: translateX(-50%);
            }
            
            .footer-links a:hover {
                transform: none;
            }
        }
        
        @media (max-width: 576px) {
            .content-wrapper {
                padding: 20px 15px;
            }
            
            .topbar {
                padding: 15px;
            }
            
            .topbar-title {
                font-size: 1.2rem;
                max-width: 200px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            
            .stats-container {
                gap: 15px;
            }
            
            .stat-card {
                padding: 15px;
            }
            
            .stat-icon {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }
            
            .stat-value {
                font-size: 1.5rem;
            }
            
            .table-actions {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }
            
            .search-box {
                width: 100%;
            }
            
            .content-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2><i class="fas fa-graduation-cap"></i> <span>ACADEMIC HUB</span></h2>
            </div>
            
            <div class="professor-info">
                
                <div class="professor-name">
                  Mr  {{ Auth::check() ? Auth::user()->firstname : '' }}   {{ Auth::check() ? Auth::user()->lastname : '' }}
              </div>
            </div>
            
            <div class="sidebar-menu">
       
                <a href="{{route('professeurdashboard.acceuil')}}" class="menu-item active">
                    <i class="fas fa-th-large"></i>
                    <span>Tableau de bord</span>
                </a>
                  

                <a href="{{route('professeurdashboard.courcreate')}}" class="menu-item">
                    <i class="fas fa-plus"></i>
                    <span>Ajouter un cour</span>
                </a>
             

                <a href="{{route('professeurdashboard.cour')}}" class="menu-item">
                    <i class="fas fa-book"></i>
                    <span>Mes Cours</span>
                </a>

                  <a href="{{route('professeurdashboard.presencecreate')}}" class="menu-item">
                                    <i class="fas fa-plus"></i>

                    <span>Faire présence l1</span>
                </a>

                  <a href="{{route('professeurdashboard.presencel2create')}}" class="menu-item">
                                    <i class="fas fa-plus"></i>

                    <span>Faire présence l2</span>
                </a>

                
                  <a href="{{route('professeurdashboard.presencel3create')}}" class="menu-item">
                                    <i class="fas fa-plus"></i>

                    <span>Faire présence l3</span>
                </a>

                <a href="{{route('professeurdashboard.presence')}}" class="menu-item">
                    <i class="fas fa-clipboard-list"> </i>
                    <span>Présence L1</span>
                </a>

                  <a href="{{route('professeurdashboard.presencel2')}}" class="menu-item">
                    <i class="fas fa-clipboard-list"> </i>
                    <span>Présence L2</span>
                </a>
                  <a href="{{route('professeurdashboard.presencel3')}}" class="menu-item">
                    <i class="fas fa-clipboard-list"> </i>
                    <span>Présence  L3</span>
                </a>

                
                

                


                <a href="#" class="menu-item">
                    
                    <span>

                        @auth
                        <li  >
                           
    
                            <ul>
                                <li>
                                    <a style="color: white; text-decoration:none ; margin-left:35px;" class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt"> </i> {{ __('Déconnexion') }}
                                    </a>
                                </li>
                            </ul>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endauth
                </ul>
                    </span>
                </a>
            
              
                
               
                
        
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content" id="main-content">
            <div class="topbar">
                <div class="topbar-left">
                    <button class="menu-toggle" id="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="topbar-title">Tableau de bord professeur</h1>
                </div>
            
            
            </div>

            <div class="content-wrapper">
                <div class="content-header">
                    <h1 class="content-title">Tableau de bord</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('professeurdashboard.acceuil')}}"><i class="fas fa-home"></i> Accueil</a></li>
                        <li class="active">Tableau de bord</li>
                    </ul>
                </div>
        
     <body>
</html>