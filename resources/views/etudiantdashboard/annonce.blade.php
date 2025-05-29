@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


<style>

        .annonces {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.9)), url('{{asset('image/carousel-1.jpg')}}');
            background-size: 110%;
            background-position: center;

            padding: 50px;
            color: white;
            text-align: center;
            height: 310px;
        }

        .annonces h2 {
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



         .annonce {
            background-color: #fff;
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .annonce:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .annonce-header {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }
        
        .annonce-header::before {
            content: "";
            position: absolute;
            width: 200px;
            height: 200px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -100px;
            right: -50px;
        }
        
        .annonce-header h2 {
            font-size: 22px;
            font-weight: 600;
            margin: 0;
            position: relative;
            z-index: 1;
        }
        
        .annonce-body {
            padding: 25px;
        }
        
        .annonce-body p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
            margin: 0;
        }
        
        .annonce-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 24px;
            opacity: 0.7;
        }
        
        .tag {
            display: inline-block;
            font-size: 12px;
            padding: 5px 12px;
            border-radius: 50px;
            background-color: rgba(255, 255, 255, 0.2);
            margin-bottom: 10px;
        }
        
        .annonce-date {
            display: block;
            font-size: 14px;
            color: #777;
            margin-top: 15px;
            font-style: italic;
        }
        
        @media (max-width: 768px) {
            .page-title {
                font-size: 48px;
            }
        }
</style>



<section class="annonces">

    <h2 class="tracking-in-expand-fwd-top"
        style=" font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;    text-align: center; color: white; font-size:75px; margin-top: 50px;  ">
        Annonces</h2>

</section><br>


<div class="container">
    <div class="row">

         @foreach ($annonces as $annonce)
             
      
       
            <div class="col-md-4 col-sm-6">
                <div class="annonce">
                    <div class="annonce-header">
                        <span class="tag">Important</span>
                        <h2>{{$annonce->title}}</h2>
                        <i class="bi bi-rocket-takeoff annonce-icon"></i>
                    </div>
                    <div class="annonce-body">
                        <p>{{$annonce->description}}</p>
                        <span class="annonce-date">Publié le {{ $annonce->created_at->format('d/m/Y')}} </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



@endsection