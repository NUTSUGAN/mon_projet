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


    <style>
        
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

/* Conteneur principal */
.dashboard {
    width: 100%;
    background: white;
    padding: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Logo */
.logo img {
    width: 100px;
    margin-bottom: 15px;
}

/* Titre */
h1 {
    color: #333;
    font-size: 26px;
    font-weight: bold;
    margin-bottom: 20px;
}

/* Menu utilisateur en horizontal */
.user-menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
    gap: 40px; /* Espacement entre les liens */
}

/* Liens du menu */
.user-menu li {
    display: inline-block;
}

.user-menu a {
    text-decoration: none;
    color: #fff;
    background:rgb(68, 139, 136);
    padding: 12px 18px;
    border-radius: 5px;
    font-size: 18px;
    transition: 0.3s;
    display: block;
}

.user-menu a:hover {
    background:rgb(42, 39, 39);
    transform: scale(1.05);
}


footer {
    width: 100%;  
    position: fixed;  
    bottom: 0;
    left: 0;  
    background-color: #333;  
    color: white;  
    text-align: center;  
    padding: 5px 0; 
}

footer .out a {
    color: white; 
    text-decoration: none; 
}


/* Adaptatif pour mobile */
@media (max-width: 768px) {
    .dashboard {
        width: 90%;
    }

    .user-menu ul {
        flex-direction: column;
        gap: 10px;
    }

    .user-menu a {
        font-size: 16px;
        padding: 10px 15px;
    }
}

    </style>
</head>
<body>

<?php if (isset($_SESSION['user'])): ?>

<div class="dashboard">
    <!-- Logo -->
    <div class="logo">
        <img src="/mon_projet/public/assets/images/logo.png" alt="Logo">
    </div>

    <!-- Titre principal -->
    <h1>Dashboard</h1>

    <!-- Menu utilisateur -->
    <nav class="user-menu">
        <ul>
            <li><a href="rooms_create.php">➕ Créer une chambre</a></li>
            <li><a href="rooms.php">🏨 Chambres disponibles</a></li>
            <li><a href="users.php">👥 Utilisateurs</a></li>
            <li><a href="reservation.php">📅 Réservations</a></li>
        </ul>
    </nav>
</div>

<?php endif; ?>

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


    
<footer>
    <div class="out">
      <a href="/mon_projet/src/Views/Auth/logout.php">Déconnexion</a>
    </div>
</footer>
</body>
</html>
