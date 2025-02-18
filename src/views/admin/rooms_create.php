<?php
session_start();

use Controllers\RoomController;

require_once __DIR__ . '/../../../vendor/autoload.php'; // Charger l'autoloader

$roomController = new RoomController();
$errorMsg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les champs du formulaire
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $capacity = (int) $_POST['capacity'];
    $price = (float) $_POST['price'];
    $imagePath = trim($_POST['image_path']); // L'utilisateur entre directement l'URL

    // Vérifier que tous les champs sont remplis
    if (!empty($name) && !empty($description) && $capacity > 0 && $price > 0 && !empty($imagePath)) {
        if ($roomController->createRoom($name, $description, $capacity, $price, $imagePath)) {
            header('Location: ../../../public/index.php?success=1');
            exit;
        } else {
            $errorMsg = "Erreur lors de la création de la chambre en base de données.";
        }
    } else {
        $errorMsg = "Tous les champs sont obligatoires.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une chambre</title>
</head>
<body>

    <h1>Créer une chambre</h1>
    
    <?php if (!empty($errorMsg)): ?>
        <p style="color:red;"><?= htmlspecialchars($errorMsg) ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="name" placeholder="Nom de la chambre" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="number" name="capacity" placeholder="Capacité" required>
        <input type="number" step="0.01" name="price" placeholder="Prix par nuit" required>
        <input type="text" name="image_path" placeholder="URL de l'image" required> <!-- Champ texte pour l'image -->
        <button type="submit">Créer</button>
    </form>

</body>
</html>
