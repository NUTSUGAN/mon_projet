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

            // Vérifications
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "Adresse email invalide.";
            } elseif (strlen($password) < 6) {
                $error = "Le mot de passe doit contenir au moins 6 caractères.";
            } elseif (!preg_match('/^\d{10,15}$/', $phone)) {
                $error = "Le numéro de téléphone doit contenir entre 10 et 15 chiffres.";
            } else {
                // Enregistrement
                $userModel->setData($username, $email, $password, $address, $phone);

                if ($userModel->register()) {
                    session_regenerate_id(true);
                    $_SESSION['user'] = [
                        'username' => $username,
                        'email' => $email
                    ];
                    $success = "Inscription réussie ! Redirection en cours...";
                    header("Location: /mon_projet/public/index.php ");
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
</head>
<body>
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

    <a href="login.php">Déjà un compte ? Connectez-vous</a>
</body>
</html>
