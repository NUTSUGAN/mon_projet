<?php

use Config\Database;
use Controllers\UserController;

require_once __DIR__ . '/../../../vendor/autoload.php'; // Charger l'autoloader

session_start();

if (!isset($_SESSION['user'])) {
    die("Accès refusé. Veuillez vous connecter.");
}

$user_id = $_SESSION['user']['id']; // 

$db = Database::getConnection();
$userController = new UserController($db);

$user = $userController->getUserById($user_id); //  On récupère l'utilisateur

if (!$user) {
    die("Utilisateur introuvable.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        $data = [
            'id' => $user_id,
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'address' => $_POST['address'],
            'phone' => $_POST['phone']
        ];
        $userController->editUser($data);
        header("Location: user.php"); // Rafraîchir après mise à jour
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
</head>
<body>

    <h1>Mon Profil</h1>

    <form method="POST">
        <label>Nom :</label>
        <input type="text" name="username" value="<?= htmlspecialchars($user['username'] ?? '') ?>" required>

        <label>Email :</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>

        <label>Adresse :</label>
        <input type="text" name="address" value="<?= htmlspecialchars($user['address'] ?? '') ?>" required>

        <label>Téléphone :</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($user['phone'] ?? '') ?>" required>

        <button type="submit" name="action" value="update">Modifier</button>
    </form>

</body>
</html>
