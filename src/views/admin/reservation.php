<?php
session_start();

use Config\Database;
use Models\Reservation;

require_once __DIR__ . '/../../../vendor/autoload.php'; // Charger l'autoloader


// Vérification du rôle de l'administrateur
if (!isset($_SESSION['user'])) {
    header('Location: /hotel_projet/views/auth/login.php');
    exit;
} elseif ($_SESSION['user']['role'] !== 'admin') {
    echo "<p style='color:red; text-align:center; font-size:18px;'>Vous n'avez pas les droits nécessaires pour accéder à cette page. Contactez un administrateur si vous pensez que c'est une erreur.</p>";
    exit; // Empêche l'exécution du reste du script
} else {
    // L'utilisateur est un administrateur, le code peut continuer
}

// Connexion à la base de données
$db = Database::getConnection();
$reservationModel = new Reservation($db);

// Récupération de toutes les réservations
$reservations = $reservationModel->getAllReservations();

// Gestion des modifications et annulations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $reservationId = $_POST['reservation_id'];
        if ($_POST['action'] === 'update') {
            $newStartDate = $_POST['start_date'];
            $newEndDate = $_POST['end_date'];
            $reservationModel->updateReservation($reservationId, $newStartDate, $newEndDate);
            echo "<p style='color:green;'>Réservation mise à jour avec succès.</p>";
        } elseif ($_POST['action'] === 'delete') {
            $reservationModel->deleteReservation($reservationId);
            echo "<p style='color:green;'>Réservation annulée avec succès.</p>";
        }
    }
    // Recharge les réservations après action
    $reservations = $reservationModel->getAllReservations();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Réservations</title>
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


    <h1>Gestion des Réservations</h1>
    <?php if (count($reservations) > 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Utilisateur</th>
                    <th>Chambre</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation): ?>
                    <tr>
                        <td><?= htmlspecialchars($reservation['user_name']) ?></td>
                        <td><?= htmlspecialchars($reservation['room_name']) ?></td>
                        <td><?= htmlspecialchars($reservation['start_date']) ?></td>
                        <td><?= htmlspecialchars($reservation['end_date']) ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="reservation_id" value="<?= $reservation['id'] ?>">
                                <label for="start_date">Date de début :</label>
                                <input type="date" name="start_date" value="<?= $reservation['start_date'] ?>" required>
                                <label for="end_date">Date de fin :</label>
                                <input type="date" name="end_date" value="<?= $reservation['end_date'] ?>" required>
                                <button type="submit" name="action" value="update">Modifier</button>
                                <button type="submit" name="action" value="delete" onclick="return confirm('Êtes-vous sûr ?')">Annuler</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucune réservation trouvée.</p>
    <?php endif; ?>

    
<footer>
    <div class="out">
      <a href="/mon_projet/src/Views/Auth/logout.php">Déconnexion</a>
    </div>
</footer>
</body>
</html>
