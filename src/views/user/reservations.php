<?php
session_start();

// Vérification de l'utilisateur connecté
if (!isset($_SESSION['user'])) {
    header('Location: /hotel_projet/views/auth/login.php');
    exit;
}

require_once '../../config/Database.php';
require_once '../../models/Reservation.php';

// Connexion à la base de données
$db = (new Database())->getConnection();
$reservationModel = new Reservation($db);

$userId = $_SESSION['user']['id'];

// Récupération des réservations de l'utilisateur
$reservations = $reservationModel->getUserReservations($userId);

// Gestion de la modification ou de l'annulation
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
    $reservations = $reservationModel->getUserReservations($userId);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Réservations</title>
</head>
<body>

<?php include '../partials/header.php'; ?>

    <h1>Mes Réservations</h1>
    <?php if (count($reservations) > 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Chambre</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation): ?>
                    <tr>
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
        <p>Vous n'avez aucune réservation pour le moment.</p>
    <?php endif; ?>
</body>
</html>
