@extends('layouts.app')

@section('content')




<style>




  
.activité {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.9)), url({{asset('image/carousel-1.jpg')}});
            background-size: 110%;
            background-position: center;

            padding: 50px;
            color: white;
            text-align: center;
            height: 310px;
        }

        .activité h2 {
            font-size: 2.5em;
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

        .tracking-in-expand-fwd-bottom {
            -webkit-animation: tracking-in-expand-fwd-bottom 0.8s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
            animation: tracking-in-expand-fwd-bottom 0.8s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
        }

        @keyframes tracking-in-expand-fwd-bottom {
            0% {
                letter-spacing: -0.5em;
                -webkit-transform: translateZ(-700px) translateY(500px);
                transform: translateZ(-700px) translateY(500px);
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






  .activities-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }
    .activity-card {
        background-color: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        transition: all 0.4s ease;
        position: relative;
    }
    .activity-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 30px rgba(0,0,0,0.2);
    }
    .activity-header {
        height: 100px;
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #3498db, #2980b9);
        padding: 20px;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .activity-header::before {
        content: '';
        position: absolute;
        top: -20px;
        right: -20px;
        width: 120px;
        height: 120px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
    }
    .activity-header::after {
        content: '';
        position: absolute;
        bottom: -30px;
        left: -30px;
        width: 80px;
        height: 80px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
    }
    .activity-domain {
        position: absolute;
        top: 15px;
        right: 15px;
        background-color: rgba(255,255,255,0.2);
        color: white;
        padding: 3px 12px;
        border-radius: 20px;
        font-weight: 500;
        font-size: 0.8rem;
        z-index: 2;
    }
    .activity-title {
        font-size: 1.3rem;
        margin: 0;
        color: white;
        font-weight: 600;
        position: relative;
        z-index: 2;
    }
    .activity-time {
        font-size: 0.9rem;
        color: rgba(255,255,255,0.9);
        margin-top: 5px;
        position: relative;
        z-index: 2;
    }
    .activity-content {
        padding: 20px;
    }
    .activity-description {
        color: #666;
        margin-bottom: 15px;
        line-height: 1.5;
    }
    .activity-button {
        text-align: center;
        background-color: #f8f9fa;
        color: #3498db;
        border: 2px solid #3498db;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        font-weight: 500;
        transition: all 0.3s;
    }
    .activity-button:hover {
        background-color: #3498db;
        color: white;
    }
    
    .section-title {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        text-align: center;
        color: white;
        font-size: 75px;
        margin-top: 50px;
        margin-bottom: 40px;
        position: relative;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(to right, #3498db, #2980b9);
        border-radius: 2px;
    }
    
    @media (max-width: 768px) {
        .activities-grid {
            grid-template-columns: 1fr;
        }
    }
</style>




<section class="activité">

    <h2 class="tracking-in-expand-fwd-top"
        style=" font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;    text-align: center; color: white; font-size:75px; margin-top: 50px;  ">
        Activités</h2>

</section><br>



 <div class="container">
    <div class="row">
        @foreach ($activites as $activite)
            <div class="col-12 col-md-4 mb-4">
                <div class="activity-card">
                    <div class="activity-header">
                        <span class="activity-domain">{{ $activite->domaine }}</span>
                        <h3 class="activity-title">{{ $activite->title }}</h3>
                        <div class="activity-time">
                            <i class="far fa-clock"></i> {{ $activite->jour_heur }}
                        </div>
                    </div>
                    <div class="activity-content">
                        <p class="activity-description">
                            {{ Str::limit($activite->description, 120) }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

    
@endsection



















