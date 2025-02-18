<?php
session_start();

use Config\Database;
use Models\Reservation;

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
$db = (new Database())->getConnection();
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
</head>
<body>


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
</body>
</html>
