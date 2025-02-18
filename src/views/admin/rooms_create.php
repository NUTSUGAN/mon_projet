<?php
session_start();

use Controllers\RoomController;

require_once __DIR__ . '/../../../vendor/autoload.php'; // Charger l'autoloader

$roomController = new RoomController();
$errorMsg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les autres champs
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $capacity = (int) $_POST['capacity'];
    $price = (float) $_POST['price'];

        // Gérer le téléchargement de l'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $uploadDirectory = 'uploads/';  // Répertoire où les images sont enregistrées

        // Créer le répertoire si il n'existe pas déjà
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);  // Crée le répertoire avec les permissions appropriées
        }

        $imagePath = $uploadDirectory . basename($_FILES['image']['name']); // Définir le chemin de l'image

        // Déplacer l'image téléchargée vers le dossier d'upload
        if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            // L'image a été téléchargée avec succès, on enregistre la chambre
            if ($roomController->createRoom($name, $description, $capacity, $price, $imagePath)) {
                header('Location: ../../../public/index.php?success=1');
                exit;
            } else {
                $errorMsg = "Erreur lors de la création de la chambre en base de données.";
            }
        } else {
            $errorMsg = "Erreur lors du téléchargement de l'image.";
        }
    } else {
        $errorMsg = "Veuillez sélectionner une image.";
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

    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Nom de la chambre" required>
        <textarea name="description" placeholder="Description"></textarea>
        <input type="number" name="capacity" placeholder="Capacité" required>
        <input type="number" step="0.01" name="price" placeholder="Prix par nuit" required>
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Créer</button>
    </form>

</body>
</html>
