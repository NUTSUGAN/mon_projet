<?php

use Config\Database;
use Models\Reservation;

require_once __DIR__ . '/../../../vendor/autoload.php'; 


session_start();

// Vérification de l'utilisateur connecté
if (!isset($_SESSION['user'])) {
    header('Location: /hotel_projet/views/auth/login.php');
    exit;
}

// Connexion à la base de données
$db = Database::getConnection();
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
    <style>
body {

    margin: 0;
}
        /* La Navbar */
        .navbar {
            width: 100%;
            height: 12vh;
            background-color: rgb(246, 234, 234);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Partie Gauche */
        .left-nav {
            width: 25%;
            height: 12vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo img {
            width: 90px;
            height: auto;
        }

        /* Partie Centre */
        .mid-nav {
            width: 50%;
            height: 12vh;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            list-style: none;
        }

        .mid-nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        .mid-nav ul li {
            position: relative;
        }

        .mid-nav a {
            text-decoration: none;
            color: black;
            font-weight: 400;
            padding: 10px 35px;
            transition: color 0.3s ease;
            font-family: 'Raleway', sans-serif;
        }

        .mid-nav a:hover {
            color: #efa507;
        }

        /* Menu déroulant */
        .dropdown-content {
            opacity: 0;
            visibility: hidden;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            padding: 0.5rem 0;
            min-width: 150px; 
            border-radius: 5px;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .dropdown-content li {
            list-style: none;
        }

        .dropdown-content a {
            display: block;
            padding: 0.5rem 1rem;
            color: black;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .dropdown:hover .dropdown-content {
            opacity: 1;
            visibility: visible;
        }


        /* Partie Droite */
        .right-nav {
            width: 25%;
            height: 12vh;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        .right-nav a {
            text-decoration: none;
            color: black;
            font-weight: 400;
            font-family: 'Raleway', sans-serif;
        }

        




        h1 {
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: black;
            color: white;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #333;
        }
        .social-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .social-buttons button {
            width: 48%;
            background: white;
            color: black;
            border: 1px solid #ccc;
        }
        .forgot-link {
            text-align: right;
            font-size: 14px;
        }


        footer {
            background-color: #1c1c1a;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            font-size: 0.9em;
        }
 
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
 
        .footer-content h2 {
            margin-bottom: 10px;
        }
 
        .footer-content a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            display: inline-block;
            margin-bottom: 20px;
            border: 1px solid #fff;
           
        }
       
        .footer-content .info {
            margin: 20px 0;
        }
        .footer-content .info h4 {
            color: #946e55 ;
        }
 
        .footer-content .logos {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }
 
        .footer-content .socials {
            display: flex;
            gap: 0;
            margin-right: 130px;
        }
 
        .footer-content .socials a {
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #fff;
 
        }
 
        .separator {
            width: 50%;
            height: 3px;
            background-color:rgb(187, 107, 54);
            margin: 30px 0; 
        }
 
        .divs-container {
            width: 100%;
            display: flex; 
            justify-content: space-between;
            align-items: center;
           
         
        }
 
        .divs-container .socials a {
       
            width:-45px;
            height:auto;
        }

       
       
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
 
            .form-section, .map-section {
                width: 100%;
            }
 
            .form-section {
                padding: 20px;
            }
        }
 
        @media (max-width: 480px) {
            .form-section h3 {
                font-size: 1.5em;
            }
 
            .form-section input, .form-section select, .form-section textarea {
                font-size: 0.9em;
            }
 
            .form-section button {
                font-size: 0.9em;
                padding: 8px 15px;
            }
        }


        .user-menu {
    background-color: #f8f9fa;
    padding: 10px;
    text-align: center;
    border-bottom: 2px solid #ddd;
}

.user-menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
    gap: 20px;
}

.user-menu ul li {
    display: inline;
}

.user-menu a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
    padding: 8px 15px;
    transition: color 0.3s ease;
}

.user-menu a:hover {
    color: #e67e22;
}



    </style>
</head>
<body>

<?php include '../partials/header.php'; ?>
<?php if (isset($_SESSION['user'])): ?>
    <nav class="user-menu">
        <ul>
            <li><a href="user.php">👤 Mon compte</a></li>
            <li><a href="reservations.php">📅 Mes Réservations</a></li>
        </ul>
    </nav>
<?php endif; ?>


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

    <?php include '../partials/footer.php'; ?>

</body>
</html>
