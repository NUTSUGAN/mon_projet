<?php

use Config\Database;
use Models\User;


require_once __DIR__ . '/../../../vendor/autoload.php'; // Charger l'autoloader

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error = '';

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    try {
        
        // Connexion à la base de données
        $db = Database::getConnection();
        $userModel = new User($db);

        // Nettoyage des entrées utilisateur
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = trim($_POST['password']);

        if (empty($email) || empty($password)) {
            throw new Exception("Veuillez remplir tous les champs.");
        }

        // Tentative de connexion de l'utilisateur
        $user = $userModel->login($email, $password);

        if ($user) {
            session_regenerate_id(true);
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role']
            ];

            // Rediriger en fonction du rôle
            $redirectUrl = ($_SESSION['user']['role'] === 'admin') ? '../admin/rooms_create.php' : '../../../public/index.php';
            header("Location: $redirectUrl");
            exit();
        } else {
            $error = "Email ou mot de passe incorrect.";
        }
    } catch (Exception $e) {
        $error = "Une erreur est survenue : " . $e->getMessage();
        // Optionnel : Logger l'erreur pour le débogage
        error_log("Erreur de connexion " );
    }
}

// Générer un token CSRF
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
body {

    margin: 0;
}
        /* La Navbar */
        .navbar {
            width: 100%;
            height: 12vh;
            background-color: rgb(246, 234, 234);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Partie Gauche */
        .left-nav {
            width: 25%;
            height: 12vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo img {
            width: 90px;
            height: auto;
        }

        /* Partie Centre */
        .mid-nav {
            width: 50%;
            height: 12vh;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            list-style: none;
        }

        .mid-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        .mid-nav ul li {
            position: relative;
        }

        .mid-nav a {
            text-decoration: none;
            color: black;
            font-weight: 400;
            padding: 10px 35px;
            transition: color 0.3s ease;
            font-family: 'Raleway', sans-serif;
        }

        .mid-nav a:hover {
            color: #efa507;
        }

        /* Menu déroulant */
        .dropdown-content {
            opacity: 0;
            visibility: hidden;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            padding: 0.5rem 0;
            min-width: 150px; 
            border-radius: 5px;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .dropdown-content li {
            list-style: none;
        }

        .dropdown-content a {
            display: block;
            padding: 0.5rem 1rem;
            color: black;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .dropdown:hover .dropdown-content {
            opacity: 1;
            visibility: visible;
        }


        /* Partie Droite */
        .right-nav {
            width: 25%;
            height: 12vh;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        .right-nav a {
            text-decoration: none;
            color: black;
            font-weight: 400;
            font-family: 'Raleway', sans-serif;
        }

        .wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh; /* Centre uniquement le formulaire */
}

.login-container {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
    width: 350px;
}
        h1 {
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: black;
            color: white;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #333;
        }
        .social-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .social-buttons button {
            width: 48%;
            background: white;
            color: black;
            border: 1px solid #ccc;
        }
        .forgot-link {
            text-align: right;
            font-size: 14px;
        }


        footer {
            background-color: #1c1c1a;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            font-size: 0.9em;
        }
 
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
 
        .footer-content h2 {
            margin-bottom: 10px;
        }
 
        .footer-content a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            display: inline-block;
            margin-bottom: 20px;
            border: 1px solid #fff;
           
        }
       
        .footer-content .info {
            margin: 20px 0;
        }
        .footer-content .info h4 {
            color: #946e55 ;
        }
 
        .footer-content .logos {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }
 
        .footer-content .socials {
            display: flex;
            gap: 0;
            margin-right: 130px;
        }
 
        .footer-content .socials a {
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #fff;
 
        }
 
        .separator {
            width: 50%;
            height: 3px;
            background-color:rgb(187, 107, 54);
            margin: 30px 0; 
        }
 
        .divs-container {
            width: 100%;
            display: flex; 
            justify-content: space-between;
            align-items: center;
           
         
        }
 
        .divs-container .socials a {
       
            width:-45px;
            height:auto;
        }
       
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
 
            .form-section, .map-section {
                width: 100%;
            }
 
            .form-section {
                padding: 20px;
            }
        }
 
        @media (max-width: 480px) {
            .form-section h3 {
                font-size: 1.5em;
            }
 
            .form-section input, .form-section select, .form-section textarea {
                font-size: 0.9em;
            }
 
            .form-section button {
                font-size: 0.9em;
                padding: 8px 15px;
            }
        }


    </style>
</head>
<body>
<?php include '../partials/header.php'; ?>

<div class="wrapper">
    <div class="login-container">
        <h1>Connexion</h1>
        <div class="social-buttons">
            <button>🔴 Google</button>
            <button>🔵 Facebook</button>
        </div>
        <form method="POST" action="login.php">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            <input type="email" name="email" placeholder="Adresse email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <div class="forgot-link">
                <a href="#">Mot de passe oublié ?</a>
            </div>
            <button type="submit">Se connecter</button>
        </form>
        <p>Première visite ? <a href="register.php">Devenez membre</a></p>
    </div>
</div>

<?php include '../partials/footer.php'; ?>

</body>
</html>
