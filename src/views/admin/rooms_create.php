<?php
require_once '../../config/Database.php';
require_once '../../controllers/AdminController.php';

$db = (new Database())->getConnection();
$adminController = new AdminController($db);
$adminController->createRoom(); 
?>



<?php
session_start();

require_once '../../config/Database.php';
require_once '../../models/Room.php';

$db = (new Database())->getConnection();
$roomModel = new Room($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $capacity = $_POST['capacity'];
    $price = $_POST['price'];

    if (!empty($_FILES['image']['name'])) {
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';
        $imageName = basename($_FILES['image']['name']);
        $imagePath = '/uploads/' . $imageName;

        // Déplacer l'image vers le dossier des uploads
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imageName)) {
            // Enregistrement de la chambre dans la base de données
            $roomModel->createRoom($name, $description, $capacity, $price, $imagePath);
            header('Location: ../public/index.php'); // Redirection vers une page de liste des chambres
            exit;
        } else {
            echo "<p style='color:red;'>Erreur lors du téléchargement de l'image.</p>";
        }
    } else {
        echo "<p style='color:red;'>Veuillez sélectionner une image.</p>";
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
