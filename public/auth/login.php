<?php
// Démarrage de la session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Inclure les fichiers nécessaires
require_once '../../config/Database.php';
require_once '../../models/User.php';

// Connexion à la base de données
$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nettoyer les entrées utilisateur
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // Pas de nettoyage ici, car le mot de passe est vérifié directement

    $user = new User($db);
    $loggedInUser = $user->login($email, $password);

    if ($loggedInUser) {
        // Connexion réussie : Enregistrer les informations utilisateur dans la session
        session_regenerate_id(true); // Sécuriser la session
        $_SESSION['user'] = [
            'id' => $loggedInUser['id'],
            'username' => $loggedInUser['username'],
            'role' => $loggedInUser['role']
        ];

        // Redirection en fonction du rôle
        if ($_SESSION['user']['role'] === 'admin') {
            header('Location: ../admin/rooms_create.php');
        } else {
            header('Location: ../../public/index.php');
        }
        exit;
    } else {
        $error = "Email ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <?php if (isset($error)) : ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="POST" action="login.php">
        <input type="email" name="email" placeholder="Adresse email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>
    <a href="./register.php">Inscription</a>
</body>
</html>
