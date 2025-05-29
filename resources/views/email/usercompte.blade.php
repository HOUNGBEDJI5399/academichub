<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vos identifiants de connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .container {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
            border: 2px solid #2c3e50;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .credentials {
            background-color: #ffffff;
            border: 1px solid #dddddd;
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .important-notice {
            background-color: #fff8e1;
            border-left: 4px solid #ffc107;
            padding: 10px 15px;
            margin: 20px 0;
            display: flex;
            align-items: center;
        }
        .icon {
            color: #ff9800;
            font-size: 24px;
            margin-right: 10px;
        }
        .header {
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #dddddd;
            font-size: 14px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Bienvenue sur ACADEMIC HUB {{ $user->firstname }} {{ $user->lastname }} !</h2>
        </div>
        
        <p>Voici vos identifiants de connexion :</p>
        
        <div class="credentials">
            <p><strong>Identifiant de connexion :</strong> {{$login_identifier }}</p>
            <p><strong>Mot de passe temporaire :</strong> {{ $temporary_password }}</p>
        </div>
        


        <div class="important-notice">
            <span class="icon">&#9888;</span>
            <p><strong>Important :</strong> Nous vous recommandons de changer votre mot de passe lors de votre première connexion.</p>
        </div>
        
        <p>Liens utiles :</p>
        <ul>
            <li><a href="{{ url('/login') }}">Page de connexion</a></li>
            <li><a href="{{ url('/passwords/reset') }}">Réinitialisation de mot de passe</a></li>
        </ul>
        
        <div class="footer">
            <p>L'équipe {{ config('app.name') }}</p>
        </div>
    </div>
</body>
</html>