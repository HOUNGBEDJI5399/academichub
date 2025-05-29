

@extends('layouts.app')

@section('content')



     <link rel="icon" href="{{ asset('image/iconeacademic.ico') }}" type="image/x-icon"   style="background-color:blue;">
     <link rel="shortcut icon" href="{{ asset('image/iconeacademic.ico') }}" type="image/x-icon"   style="background-color:blue;">

  
    
    <style>
        /* Base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f7;
            overflow-x: hidden;
        }

       


            
     .cour{
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.9)),url({{asset('image/carousel-1.jpg')}});
        background-size: 110%; 
       background-position: center; 
        padding: 50px;
       color: white;
       text-align: center;
       height: 340px; 
          }

    .cour h2 {
    font-size: 2.5em;
   }

        .hero-banner h1 {
            font-size: 5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            animation: fadeInUp 1.2s ease-out;
        }

        .hero-banner::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 80px;
            background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgb(245, 247, 246) 100%);
        }

        /* Animated title */
      

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

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Welcome section */
        .welcome-section {
            padding: 50px 20px;
            text-align: center;
            background-color: #f5f5f7;
            position: relative;
            z-index: 5;
        }

        .welcome-section h2 {
            color: #09aded;
            font-size: 2.5rem;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease-out 0.3s both;
        }

        .welcome-text {
            max-width: 800px;
            margin: 0 auto 3rem auto;
            color: #333;
            font-size: 1.2rem;
            line-height: 1.6;
            animation: fadeInUp 1s ease-out 0.5s both;
        }

        /* Course grid */
        .courses-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .courses-heading {
            text-align: center;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 2rem;
        }

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 2rem;
        }

        .course-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            position: relative;
            transform-origin: center bottom;
            animation: fadeInUp 0.8s ease-out both;
        }

        .course-card:nth-child(1) { animation-delay: 0.3s; }
        .course-card:nth-child(2) { animation-delay: 0.5s; }
        .course-card:nth-child(3) { animation-delay: 0.7s; }

        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(9, 173, 237, 0.2);
        }

        .course-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
        }

        .course-content {
            padding: 20px;
        }

        .course-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .course-description {
            font-size: 1rem;
            color: #666;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .course-button {
            display: inline-block;
            background: linear-gradient(45deg, #09aded, #0056b3);
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(9, 173, 237, 0.3);
        }

        .course-button:hover {
            background: linear-gradient(45deg, #0056b3, #09aded);
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(9, 173, 237, 0.4);
        }

        /* Decorative elements */
        .shape {
            position: absolute;
            z-index: 0;
        }

        .shape-1 {
            top: 100px;
            left: -80px;
            width: 180px;
            height: 180px;
            background: linear-gradient(45deg, #09aded33, #0056b333);
            border-radius: 50%;
            filter: blur(60px);
            animation: float 8s ease-in-out infinite;
        }

        .shape-2 {
            bottom: 200px;
            right: -100px;
            width: 250px;
            height: 250px;
            background: linear-gradient(45deg, #09aded22, #7b00ff22);
            border-radius: 50%;
            filter: blur(80px);
            animation: float 10s ease-in-out infinite reverse;
        }

        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
            100% { transform: translateY(0) rotate(0deg); }
        }

        /* Media queries */
        @media screen and (max-width: 992px) {
            .hero-banner h1 {
                font-size: 4rem;
            }
            
            .courses-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            }
        }

        @media screen and (max-width: 768px) {
            .hero-banner {
                height: 320px;
            }
            
            .hero-banner h1 {
                font-size: 3rem;
            }
            
            .welcome-section h2 {
                font-size: 2rem;
            }
            
            .welcome-text {
                font-size: 1rem;
            }
        }

        @media screen and (max-width: 576px) {
            .hero-banner h1 {
                font-size: 2.5rem;
            }
            
            .courses-grid {
                grid-template-columns: 1fr;
            }
            
            .course-card {
                max-width: 400px;
                margin: 0 auto;
            }

            .tracking-in-expand-fwd-top {
            -webkit-animation: tracking-in-expand-fwd-top 0.8s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
	        animation: tracking-in-expand-fwd-top 0.8s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
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





 
        }
    </style>

    
 
        <section class="cour">

       <h2 class="tracking-in-expand-fwd-top" style="text-align: center;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
       color: white; font-size: 75px; margin-top: 50px;  ">COURS</h2>

    </section><br><br>

   

    
    <section class="welcome-section">
        <h2>Bienvenue dans l'espace d'apprentissage universitaire</h2>
        <p class="welcome-text">
            ACADEMIC HUB vous offre un accès complet aux ressources pédagogiques de votre parcours universitaire.
            Naviguez à travers les différentes années d'études et accédez aux cours adaptés à votre niveau.
        </p>
    </section>

    
    <section class="courses-container">
        <div class="courses-grid">
            <!-- L1 Course Card -->
            <div class="course-card">
                <img src="{{asset('image/cours1.jpg')}}" alt="Licence 1" class="course-image">
                <div class="course-content">
                    <h3 class="course-title">Licence 1 (L1)</h3>
                    <p class="course-description">Accédez aux cours fondamentaux de première année et découvrez les bases de votre discipline.</p>
                    <a href="{{route('etudiantdashboard.courl1')}}" class="course-button">Voir les cours L1</a>
                </div>
            </div>
            
            <!-- L2 Course Card -->
            <div class="course-card">
                <img src="{{asset('image/cours2.jpg')}}" alt="Licence 2" class="course-image">
                <div class="course-content">
                    <h3 class="course-title">Licence 2 (L2)</h3>
                    <p class="course-description">Approfondissez vos connaissances avec les modules avancés de deuxième année.</p>
                    <a href="{{route('etudiantdashboard.courl2')}}" class="course-button">Voir les cours L2</a>
                </div>
            </div>
            
            <!-- L3 Course Card -->
            <div class="course-card">
                <img src="{{asset('image/cours3.jpg')}}" alt="Licence 3" class="course-image">
                <div class="course-content">
                    <h3 class="course-title">Licence 3 (L3)</h3>
                    <p class="course-description">Spécialisez-vous dans votre domaine avec les cours de spécialisation de troisième année.</p>
                    <a href="{{route('etudiantdashboard.courl3')}}" class="course-button">Voir les cours L3</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>