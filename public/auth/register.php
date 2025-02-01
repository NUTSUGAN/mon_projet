<?php
require '../../config/Database.php';
require '../../models/User.php';

$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User($db);
    $user->username = $_POST['username'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    $user->address = $_POST['address'];
    $user->phone = $_POST['phone'];

    if ($user->register()) {
        session_start();

        // Redirige vers la page d'accueil
        header('Location: ../../public/index.php');

        exit(); 
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>
<form method="POST" action="register.php">
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="email" name="email" placeholder="Adresse email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <input type="text" name="address" placeholder="Adresse">
    <input type="text" name="phone" placeholder="Numéro de téléphone">
    <button type="submit">S'inscrire</button>
</form>
