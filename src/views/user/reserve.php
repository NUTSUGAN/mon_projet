<?php

use Config\Database;
use Models\Reservation;

require_once __DIR__ . '/../../../vendor/autoload.php'; 

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /mon_projet/views/auth/login.php');
    exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roomId = $_POST['room_id'] ?? null;
    $startDate = $_POST['start_date'] ?? null;
    $endDate = $_POST['end_date'] ?? null;

    // Vérification des dates (empêcher la sélection de jours passés)
    $today = date('Y-m-d'); // Récupère la date actuelle au format YYYY-MM-DD
    if ($startDate < $today || $endDate < $today) {
        $message = "<p class='error'>Vous ne pouvez pas réserver pour une date passée.</p>";
    } elseif ($startDate >= $endDate) {
        $message = "<p class='error'>La date de fin doit être après la date de début.</p>";
    } elseif ($roomId && $startDate && $endDate) {
        $db = Database::getConnection();
        $reservationModel = new Reservation($db);
        $userId = $_SESSION['user']['id'];

        if ($reservationModel->createReservation($userId, $roomId, $startDate, $endDate)) {
            header('Location: ../../../public/index.php?success=1');
            exit;
        } else {
            $message = "<p class='error'>Une erreur est survenue lors de la réservation.</p>";
        }

        $db = null;
    } else {
        $message = "<p class='error'>Veuillez remplir tous les champs requis.</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver une chambre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        form {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            margin: 20px auto;
        }

        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        form input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #2980b9;
        }

        .error {
            color: #e74c3c;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
        }

        .success {
            color: #27ae60;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
        }

        p {
            margin: 0;
        }
    </style>
</head>
<body>

    <div>
        <h1>Réserver une chambre</h1>
        <?php if ($message) echo $message; ?>
        <form method="POST">
            <?php $roomId = htmlspecialchars($_POST['room_id'] ?? ''); ?>
            <?php if (!$roomId): ?>
                <p class="error">Erreur : aucune chambre sélectionnée.</p>
            <?php endif; ?>
            <input type="hidden" name="room_id" value="<?= $roomId ?>">
            <label for="start_date">Date de début :</label>
            <input type="date" id="start_date" name="start_date" required>

            <label for="end_date">Date de fin :</label>
            <input type="date" id="end_date" name="end_date" required>

            <button type="submit">Réserver</button>
        </form>
    </div>

    <script>
        // Définir la date minimale pour empêcher la sélection des jours passés
        document.addEventListener("DOMContentLoaded", function () {
            let today = new Date().toISOString().split("T")[0];
            document.getElementById("start_date").setAttribute("min", today);
            document.getElementById("end_date").setAttribute("min", today);
        });

        // S'assurer que la date de fin ne soit pas avant la date de début
        document.getElementById("start_date").addEventListener("change", function () {
            document.getElementById("end_date").setAttribute("min", this.value);
        });
    </script>

</body>
</html>
