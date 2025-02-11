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
            font-family: Arial, sans-serif;
            background: linear-gradient(to right,rgb(139, 131, 112),rgb(137, 150, 167));
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
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
    </style>
</head>
<body>
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
</body>
</html>
