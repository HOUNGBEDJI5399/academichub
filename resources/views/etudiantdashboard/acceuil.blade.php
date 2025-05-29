@extends('layouts.app')

@section('content')


<style>

     /* Carousel Styling */
     .carousel-item {
            position: relative;
            height: 90vh;
            min-height: 500px;
        }

        .carousel-item img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            
            filter: brightness(35%);
        }

        .carousel-caption {
            background: rgba(0,0,0,0.5);
            border-radius: 15px;
            padding: 30px;
            text-align: left;
            max-width: 700px;
        }

        /* Animations - Keeping Original Style */
        .tracking-in-expand-fwd-top {
            animation: tracking-in-expand-fwd-top 0.8s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
        }

        .tracking-in-expand-fwd-bottom {
            animation: tracking-in-expand-fwd-bottom 0.8s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
        }

        @keyframes tracking-in-expand-fwd-top {
            0% {
                letter-spacing: -0.5em;
                transform: translateZ(-700px) translateY(-500px);
                opacity: 0;
            }
            40% { opacity: 0.6; }
            100% {
                transform: translateZ(0) translateY(0);
                opacity: 1;
            }
        }

        @keyframes tracking-in-expand-fwd-bottom {
            0% {
                letter-spacing: -0.5em;
                transform: translateZ(-700px) translateY(500px);
                opacity: 0;
            }
            40% { opacity: 0.6; }
            100% {
                transform: translateZ(0) translateY(0);
                opacity: 1;
            }
        }
</style>


<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{asset('image/carousel-2.jpg')}}" class="d-block w-100" alt="Campus universitaire">
            <div class="carousel-caption d-flex flex-column justify-content-center align-items-start h-100">
                <h5 class="tracking-in-expand-fwd-top" style="font-size: 75px;">
                    <samp style="font-style: italic;">Bienvenue  sur   </samp> <br> 
                    <span style="color: #09aded;">ACADEMIC HUB</span>
                </h5>
                <p class="tracking-in-expand-fwd-bottom" style="font-size: 20px;">
                    Accédez facilement à vos cours et gérez vos paiements de frais scolaires en toute simplicité.
                </p>
            </div>
        </div>
        <div class="carousel-item">
            <img  src="{{asset('image/carousel-1.jpg')}}" class="d-block w-100" alt="Étudiant sur le campus">
            <div class="carousel-caption d-flex flex-column justify-content-center align-items-start h-100">
                <h5 class="tracking-in-expand-fwd-top" style="font-size: 75px; color: #09aded;">
                    <span style="font-style: italic;">Votre Parcours <br> Universitaire</span>
                </h5>
                <p class="tracking-in-expand-fwd-bottom" style="font-size: 20px;">
                    Sur Academic Hub, effectuez vos paiements scolaires rapidement et en toute sécurité.
                </p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Précédent</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Suivant</span>
    </button>
</div>



@endsection