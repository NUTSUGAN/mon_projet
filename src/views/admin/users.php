<?php

use Config\Database;
use Controllers\UserController;

require_once __DIR__ . '/../../../vendor/autoload.php'; // Charger l'autoloader

session_start();

$db = Database::getConnection();
$userController = new UserController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'delete' && isset($_POST['id'])) {
            $userController->deleteUser($_POST['id']);
        } elseif ($_POST['action'] === 'edit') {
            $userController->editUser($_POST);
        }
    }
}

$users = $userController->listUsers();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs</title>
    <script>
        function showEditForm(id, username, email, address, phone) {
            document.getElementById('editFormContainer').style.display = 'block';
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_username').value = username;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_address').value = address;
            document.getElementById('edit_phone').value = phone;
        }
    </script>
</head>
<body>

    <h1>Gestion des utilisateurs</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']) ?></td>
                    <td><?= htmlspecialchars($user['username']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['address']) ?></td>
                    <td><?= htmlspecialchars($user['phone']) ?></td>
                    <td>
                        <!-- Formulaire de suppression -->
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                            <button type="submit" name="action" value="delete">Supprimer</button>
                        </form>

                        <!-- Bouton Modifier qui affiche le formulaire -->
                        <button type="button" onclick="showEditForm(
                            '<?= htmlspecialchars($user['id']) ?>',
                            '<?= htmlspecialchars($user['username']) ?>',
                            '<?= htmlspecialchars($user['email']) ?>',
                            '<?= htmlspecialchars($user['address']) ?>',
                            '<?= htmlspecialchars($user['phone']) ?>'
                        )">Modifier</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Formulaire de modification (affiché uniquement après clic sur Modifier) -->
    <div id="editFormContainer" style="display:none; margin-top:20px;">
        <h2>Modifier l'utilisateur</h2>
        <form method="POST">
            <input type="hidden" id="edit_id" name="id">
            <input type="text" id="edit_username" name="username" required>
            <input type="email" id="edit_email" name="email" required>
            <input type="text" id="edit_address" name="address" required>
            <input type="text" id="edit_phone" name="phone" required>
            <button type="submit" name="action" value="edit">Enregistrer</button>
        </form>
    </div>

</body>
</html>
