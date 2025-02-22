<?php

use Config\Database;
use Controllers\RoomController;

require_once __DIR__ . '/../../../vendor/autoload.php';

session_start();

// Vérifier si l'utilisateur est admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: /index.php");
    exit();
}

$db = Database::getConnection();
$roomController = new RoomController();

// Gestion des actions (modifier ou supprimer)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'delete' && isset($_POST['id'])) {
            $roomController->deleteRoom($_POST['id']);
        } elseif ($_POST['action'] === 'edit') {
            $roomController->updateRoom($_POST['id'], $_POST['name'], $_POST['description'], $_POST['capacity'], $_POST['price'], $_POST['image_path']);
        }
    }
}

// Récupérer toutes les chambres
$rooms = $roomController->getAvailableRooms(date('Y-m-d'), date('Y-m-d'));

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des chambres</title>
    <script>
        function showEditForm(id, name, description, capacity, price, image_path) {
            document.getElementById('editFormContainer').style.display = 'block';
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_description').value = description;
            document.getElementById('edit_capacity').value = capacity;
            document.getElementById('edit_price').value = price;
            document.getElementById('edit_image_path').value = image_path;
        }
    </script>
</head>
<body>

    <h1>Gestion des chambres</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Capacité</th>
                <th>Prix</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rooms as $room): ?>
                <tr>
                    <td><?= htmlspecialchars($room['id']) ?></td>
                    <td><?= htmlspecialchars($room['name']) ?></td>
                    <td><?= htmlspecialchars($room['description']) ?></td>
                    <td><?= htmlspecialchars($room['capacity']) ?> personnes</td>
                    <td><?= htmlspecialchars($room['price']) ?> €</td>
                    <td><img src="<?= htmlspecialchars($room['image_path']) ?>" width="50"></td>
                    <td>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($room['id']) ?>">
                            <button type="submit" name="action" value="delete">Supprimer</button>
                        </form>

                        <button type="button" onclick="showEditForm(
                            '<?= htmlspecialchars($room['id']) ?>',
                            '<?= htmlspecialchars($room['name']) ?>',
                            '<?= htmlspecialchars($room['description']) ?>',
                            '<?= htmlspecialchars($room['capacity']) ?>',
                            '<?= htmlspecialchars($room['price']) ?>',
                            '<?= htmlspecialchars($room['image_path']) ?>'
                        )">Modifier</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Formulaire de modification -->
    <div id="editFormContainer" style="display:none; margin-top:20px;">
        <h2>Modifier la chambre</h2>
        <form method="POST">
            <input type="hidden" id="edit_id" name="id">
            <input type="text" id="edit_name" name="name" required>
            <textarea id="edit_description" name="description" required></textarea>
            <input type="number" id="edit_capacity" name="capacity" required>
            <input type="number" step="0.01" id="edit_price" name="price" required>
            <input type="text" id="edit_image_path" name="image_path" required>
            <button type="submit" name="action" value="edit">Enregistrer</button>
        </form>
    </div>

</body>
</html>
