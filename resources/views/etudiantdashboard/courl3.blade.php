@extends('layouts.app')

@section('content')
<style>
    /* Main hero section */
    .course-hero {
         background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.9)),url({{asset('image/carousel-1.jpg')}});
        background-size: 110%; 
       background-position: center; 
       padding: 50px;
       color: white;
       text-align: center;
       height: 310px; 
    }

    .course-hero::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 70px;
    }

    .course-hero h1 {
        font-size: 4rem;
        font-weight: 800;
        margin-bottom: 20px;
       
    }

    .course-hero p {
        font-size: 1.5rem;
        max-width: 700px;
        margin: 0 auto;
        opacity: 0.9;
    }

    /* Course cards styling */
    .courses-section {
        padding: 60px 0;
        background-color: #f8f9fa;
    }

    .course-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .section-title {
        text-align: center;
        margin-bottom: 40px;
        position: relative;
    }

    .section-title h2 {
        font-size: 2.5rem;
        color: #333;
        display: inline-block;
    }

    .section-title h2:after {
        content: '';
        display: block;
        width: 70px;
        height: 4px;
        background: #09aded;
        margin: 15px auto 0;
        border-radius: 2px;
    }

    .course-card {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        height: 100%;
        border: none;
        position: relative;
    }

    .course-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(9, 173, 237, 0.2);
    }

    .course-card img {
        height: 180px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .course-card:hover img {
        transform: scale(1.05);
    }

    .course-card .card-body {
        padding: 25px;
    }

    .course-card .card-title {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #222;
    }

    .course-card .card-text {
        color: #555;
        margin-bottom: 25px;
        line-height: 1.6;
    }

    .course-btn {
        background-color: #09aded;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .course-btn:hover {
        background-color: #0788c0;
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(9, 173, 237, 0.3);
    }

    .course-meta {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        font-size: 0.9rem;
        color: #777;
    }

    .course-tag {
        position: absolute;
        top: 20px;
        right: 20px;
        background: #09aded;
        color: white;
        padding: 5px 15px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    /* Animations */
    .fade-in {
        animation: fadeIn 1.2s ease-in-out forwards;
    }

    .slide-up {
        opacity: 0;
        transform: translateY(50px);
        animation: slideUp 0.6s ease-out forwards;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Staggered card animations */
    .course-card-wrapper:nth-child(1) .course-card { animation-delay: 0.1s; }
    .course-card-wrapper:nth-child(2) .course-card { animation-delay: 0.2s; }
    .course-card-wrapper:nth-child(3) .course-card { animation-delay: 0.3s; }
    .course-card-wrapper:nth-child(4) .course-card { animation-delay: 0.4s; }
    .course-card-wrapper:nth-child(5) .course-card { animation-delay: 0.5s; }
    .course-card-wrapper:nth-child(6) .course-card { animation-delay: 0.6s; }
</style>

<!-- Hero Section -->
<section class="course-hero fade-in">
    <div class="container">
        <h1 class="tracking-in-expand-fwd-top">COURS L3</h1>
       
    </div>
</section>

<!-- Courses Section -->
<!-- Courses Section -->
<section class="courses-section">
    <div class="course-container">
        <div class="section-title">
        </div>
        @if($cours->count() > 0)
            <div class="row">
                @foreach ($cours as $cour) 
                    <div class="col-12 col-md-4 mb-4">
                        <div class="course-card slide-up">
                            <div class="position-relative">
                                <img src="{{asset('image/icone.png')}}" class="card-img-top" alt="">
                                <span style="background-color:white; color:blue;font-size:15px;" class="course-tag">{{ $cour->categorie }}</span>
                            </div>
                            <div class="card-body">
                                <h5 style="color: #0788c0" class="card-title"> {{ $cour->nom_cour }}</h5>
                                
                                <!-- Lien pour afficher le fichier -->
                                @if($cour->fichierPath)
                                    <a href="{{ asset('storage/'.$cour->fichierPath) }}" class="course-btn" target="_blank">
                                        Voir le cours
                                    </a>
                                @else
                                    <p>Pas de fichier disponible</p>
                                @endif
                                
                                <div class="course-meta">
                                    <!-- Informations supplémentaires si nécessaire -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center">
                Aucun cours disponible
            </div>
        @endif
    </div>
</section>

<!-- Add Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- Optional: Add Intersection Observer for better animations -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('slide-up');
                }
            });
        }, {threshold: 0.1});
        
        document.querySelectorAll('.course-card').forEach(card => {
            observer.observe(card);
        });
    });
</script>
@endsection