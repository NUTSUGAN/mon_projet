<?php
use Config\Database;
use Models\User;

require_once __DIR__ . '/../../../vendor/autoload.php'; // Charger l'autoloader

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $error = "Erreur de validation du formulaire.";
    } else {
        try {
            $db = Database::getConnection();
            $userModel = new User($db);

            $username = trim($_POST['username']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            $address = trim($_POST['address']);
            $phone = preg_replace('/[^0-9]/', '', $_POST['phone']);

            // Vérifications de base
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Adresse email invalide.";
            } elseif (strlen($password) < 6) {
                $error = "Le mot de passe doit contenir au moins 6 caractères.";
            } elseif (!preg_match('/^\d{10,15}$/', $phone)) {
                $error = "Le numéro de téléphone doit contenir entre 10 et 15 chiffres.";
            } elseif ($userModel->emailExists($email)) {  // Vérifie si l'email existe déjà
                $error = "Cette adresse email est déjà utilisée.";
            } else {
                // Enregistrement si l'email n'existe pas
                $userModel->setData($username, $email, $password, $address, $phone);

                if ($userModel->register()) {
                    $success = "Inscription réussie ! Veuillez vous connecter.";
                    header("Location: login.php?message=" . urlencode($success));
                    exit();
                } else {
                    $error = "Erreur lors de l'inscription.";
                }
            }
        } catch (Exception $e) {
            $error = "Une erreur est survenue : " . $e->getMessage();
        }
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
    <title>Inscription</title>

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
       

        .login-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
            color: #333;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .login-link:hover {
            color: #efa507; /* Couleur dorée au survol */
            text-decoration: underline;
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

    <h1>Inscription</h1>

    <?php if (!empty($error)) : ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php elseif (!empty($success)) : ?>
        <p style="color:green;"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <form method="POST" action="register.php">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="email" name="email" placeholder="Adresse email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="text" name="address" placeholder="Adresse">
        <input type="text" name="phone" placeholder="Numéro de téléphone" required>
        <button type="submit">S'inscrire</button>
    </form>

    <a href="login.php" class="login-link">Déjà un compte ? Connectez-vous</a>

    <?php include '../partials/footer.php'; ?>

</body>
</html>

