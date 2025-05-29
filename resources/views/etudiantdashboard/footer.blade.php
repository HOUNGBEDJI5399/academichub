<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for additional icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
       


        

        /* Footer Styling */
        footer {
            background-color: #f8f9fa;
            padding: 50px 0;
            color:black;
            margin-top:35px;
            
          
        }
        footer h2{
          font-size:37px;
          font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        footer p{
          font-size:20px;
       
        }
        footer h4{
          color:  #09aded;
       
        }


        .footer-link {
            color: black;
            transition: color 0.3s ease, transform 0.3s ease;
            font-size:18px;
            text-decoration:none;
            
        }

        .footer-link:hover {
            color: var(--primary-color);
            transform: translateX(5px);
        }

  
        
    </style>
</head>
<body>
   

    

    

    <!-- Footer -->
    <footer class="container-fluid bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h2 class="text-primary mb-4">ACADEMIC HUB</h2>
                    <p>Votre plateforme universitaire complète pour une expérience académique optimale.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h4  class="mb-3">Liens Rapides</h4>
                    <div class="d-flex flex-column">
                        <a href="{{route('etudiantdashboard.acceuil')}}" class="footer-link mb-2">Accueil</a>
                        <a href="{{route('etudiantdashboard.cour')}}" class="footer-link mb-2">Cours</a>
                        <a href="{{route('etudiantdashboard.club')}}" class="footer-link mb-2">Clubs</a>
                        <a href="{{route('etudiantdashboard.activite')}}" class="footer-link mb-2">Activités</a>
                        <a href="{{route('etudiantdashboard.annonce')}}" class="footer-link mb-2">Annonce</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h4 class="mb-3">Contactez-nous</h4>
                    <p>
                        <i class="fas fa-map-marker-alt me-2"></i> BP 123, Cotonou, BENIN<br>
                        <i class="fas fa-phone me-2"></i> +229 0153990550<br>
                        <i class="fas fa-envelope me-2"></i> info@academichub.com
                    </p>
                </div>
            </div>
            <div class="text-center mt-4 pt-3 border-top">
                <p>&copy; 2024 Academic Hub. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>