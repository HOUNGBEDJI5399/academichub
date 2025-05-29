

@extends('layouts.app')

@section('content')
    <style>
        /* Base styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: #f9f9f9;
            overflow-x: hidden;
            color: #333;
        }
        
            
.club{
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.9)),url({{asset('image/carousel-1.jpg')}});
        background-size: 110%; 
       background-position: center; 
       padding: 50px;
       color: white;
       text-align: center;
       height: 310px; 
          }

.club h2 {
  font-size: 2.5em;
}
        /* Hero section with 3D parallax effect */
        .
        .animated-text {
            animation: tracking-expand 1.2s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
        }
        
        @keyframes tracking-expand {
            0% {
                letter-spacing: -0.5em;
                transform: translateZ(-700px) translateY(-100px);
                opacity: 0;
            }
            40% {
                opacity: 0.6;
            }
            100% {
                transform: translateZ(0) translateY(0);
                opacity: 1;
            }
        }
        
        .hero-particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        
        .particle {
            position: absolute;
            display: block;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            pointer-events: none;
        }
        
        @keyframes moveParticles {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
            }
        }
        
        /* Club section styling */
        .join-club {
            text-align: center;
            padding: 30px 0 20px;
            position: relative;
            z-index: 2;
        }
        
        .join-button {
            background: linear-gradient(135deg, #09aded, #0575a5);
            color: white;
            font-size: 1.5rem;
            padding: 15px 35px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 10px 20px rgba(9, 173, 237, 0.3);
            text-decoration: none;
            display: inline-block;
            font-weight: 600;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
            animation: pulse 2s infinite;
        }
        
        .join-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: 0.5s;
        }
        
        .join-button:hover::before {
            left: 100%;
        }
        
        .join-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(9, 173, 237, 0.4);
            background: linear-gradient(135deg, #0575a5, #09aded);
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(9, 173, 237, 0.5);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(9, 173, 237, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(9, 173, 237, 0);
            }
        }
        
        /* Club cards container */
        .clubs-container {
            max-width: 1400px;
            margin: 20px auto;
            padding: 20px;
            position: relative;
        }
        
        .clubs-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-bottom: 50px;
        }
        
        /* Club card styling with hover effects */
        .club-card {
            background: white;
            width: 340px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            position: relative;
            z-index: 1;
            transform: translateY(30px);
            opacity: 0;
            animation: fadeInUp 0.8s forwards;
            animation-delay: calc(0.2s * var(--i));
        }
        
        .club-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(9, 173, 237, 0.2);
        }
        
        .club-image {
            position: relative;
            height: 280px;
            overflow: hidden;
        }
        
        .club-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1), filter 0.6s ease;
        }
        
        .club-card:hover .club-image img {
            transform: scale(1.1) translateY(-10px);
            filter: brightness(0.8) contrast(1.1);
        }
        
        .club-image::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 40%;
            background: linear-gradient(to top, rgba(0,0,0,0.6), transparent);
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        
        .club-card:hover .club-image::after {
            opacity: 1;
        }
        
        .club-content {
            padding: 25px;
            position: relative;
        }
        
        .club-title {
            color: #09aded;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
            position: relative;
        }
        
        .club-title::after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background: #09aded;
            bottom: -8px;
            left: 0;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }
        
        .club-card:hover .club-title::after {
            transform: scaleX(1);
        }
        
        .club-description {
            color: #555;
            line-height: 1.6;
            font-size: 1.1rem;
            transition: transform 0.3s ease;
        }
        
        .club-card:hover .club-title {
            transform: translateY(-5px);
        }
        
        .club-card:hover .club-description {
            transform: translateY(5px);
        }
        
        /* Animation keyframes */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Curve separator between sections */
        .curve-separator {
            position: relative;
            height: 100px;
            margin-top: -50px;
        }
        
        .curve {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: #f9f9f9;
            border-radius: 50% 50% 0 0 / 100% 100% 0 0;
            transform: translateY(-50%);
            z-index: 3;
        }
        
        /* Background elements */
        .bg-gradient {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(9, 173, 237, 0.03), rgba(55, 230, 185, 0.03));
            z-index: -1;
            pointer-events: none;
        }
        
        .bg-circle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(9, 173, 237, 0.1), rgba(255, 255, 255, 0));
            filter: blur(60px);
            z-index: -1;
        }
        
        .bg-circle-1 {
            top: 20%;
            left: -10%;
            width: 500px;
            height: 500px;
        }
        
        .bg-circle-2 {
            bottom: 10%;
            right: -5%;
            width: 400px;
            height: 400px;
            background: linear-gradient(135deg, rgba(55, 230, 185, 0.1), rgba(255, 255, 255, 0));
        }
        
        /* Responsive design */
        @media (max-width: 1200px) {
            .clubs-row {
                gap: 20px;
            }
            
            .club-card {
                width: 320px;
            }
        }
        
        @media (max-width: 992px) {
            .hero h1 {
                font-size: 5rem;
            }
            
            .join-button {
                font-size: 1.3rem;
                padding: 12px 30px;
            }
        }
        
        @media (max-width: 768px) {
            .hero {
                height: 350px;
            }
            
            .hero h1 {
                font-size: 4rem;
            }
            
            .club-card {
                width: 100%;
                max-width: 450px;
            }
            
            .join-button {
                font-size: 1.1rem;
                padding: 10px 25px;
            }
        }
        
        @media (max-width: 576px) {
            .hero h1 {
                font-size: 3rem;
            }
            
            .club-image {
                height: 240px;
            }
            
            .clubs-container {
                padding: 15px;
            }
        }


          .tracking-in-expand-fwd-top {
            -webkit-animation: tracking-in-expand-fwd-top 0.8s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
            animation: tracking-in-expand-fwd-top 0.8s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
        }

        @keyframes tracking-in-expand-fwd-top {
            0% {
                letter-spacing: -0.5em;
                -webkit-transform: translateZ(-700px) translateY(-500px);
                transform: translateZ(-700px) translateY(-500px);
                opacity: 0;
            }

            40% {
                opacity: 0.6;
            }

            100% {
                -webkit-transform: translateZ(0) translateY(0);
                transform: translateZ(0) translateY(0);
                opacity: 1;
            }
        }

    </style>
</head>
<body>
 
 
        <section class="club">

       <h2 class="animated-text" style="text-align: center;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
       color: white; font-size: 75px; margin-top: 50px;  ">CLUBS</h2>

    </section><br><br>
    
   
    
    <!-- Join Club Section -->
    <section class="join-club">
        <a href="{{route('etudiantdashboard.inscritclub')}}" class="join-button">S'inscrire à un club</a>
       
        
    </section>
    
    <!-- First Row of Clubs -->
    <section class="clubs-container">
        <div class="clubs-row">
            <!-- Club 1 -->
            <div class="club-card" style="--i:1">
                <div class="club-image">
                    <img src="{{asset('image/club1.1.jpg')}}" alt="Club Football">
                </div>
                <div class="club-content">
                    <h2 class="club-title">CLUB FOOT</h2>
                    <p class="club-description">Le Club de Football de l'université réunit les passionnés du ballon rond pour des entraînements réguliers et des compétitions inter-universitaires.</p>
                </div>
            </div>
            
            <!-- Club 2 -->
            <div class="club-card" style="--i:2">
                <div class="club-image">
                    <img src="{{asset('image/club2.jpg')}}" alt="Club Basketball">
                </div>
                <div class="club-content">
                    <h2 class="club-title">CLUB BASKET</h2>
                    <p class="club-description">Le Club de Basket de l'université regroupe les amateurs de basket pour des entraînements intensifs et des tournois au niveau national.</p>
                </div>
            </div>
            
            <!-- Club 3 -->
            <div class="club-card" style="--i:3">
                <div class="club-image">
                    <img src="{{asset('image/club4.jpg')}}" alt="Club Otaku">
                </div>
                <div class="club-content">
                    <h2 class="club-title">CLUB OTAKU</h2>
                    <p class="club-description">Le Club Otaku de l'université rassemble les fans d'anime et de manga pour des échanges, projections et événements thématiques.</p>
                </div>
            </div>
        </div>
        
        <!-- Second Row of Clubs -->
        <div class="clubs-row">
            <!-- Club 4 -->
            <div class="club-card" style="--i:4">
                <div class="club-image">
                    <img src="{{asset('image/club5.jpg')}}" alt="Club Tech">
                </div>
                <div class="club-content">
                    <h2 class="club-title">CLUB TECH</h2>
                    <p class="club-description">Le Club TECH propose des ateliers pratiques et des projets innovants pour tous les passionnés de nouvelles technologies.</p>
                </div>
            </div>
            
            <!-- Club 5 -->
            <div class="club-card" style="--i:5">
                <div class="club-image">
                    <img src="{{asset('image/club3.jpg')}}" alt="Club Danse">
                </div>
                <div class="club-content">
                    <h2 class="club-title">CLUB DANSE</h2>
                    <p class="club-description">Le Club de Danse de l'université accueille tous les passionnés de danse pour des répétitions, chorégraphies et spectacles variés.</p>
                </div>
            </div>
            
            <!-- Club 6 -->
            <div class="club-card" style="--i:6">
                <div class="club-image">
                    <img src="{{asset('image/club6.jpg')}}" alt="Club Musique">
                </div>
                <div class="club-content">
                    <h2 class="club-title">CLUB MUSIQUE</h2>
                    <p class="club-description">Le Club de Musique de l'université réunit les mélomanes pour des répétitions, concerts, compositions et créations musicales.</p>
                </div>
            </div>
        </div>
    </section>
    
  
@endsection