<?php
use Config\Database;
use Models\Room;

require_once '../vendor/autoload.php'; // Charger l'autoloader

try {
    // Connexion à la base de données
    $db = Database::getConnection();
    $roomModel = new Room($db);

    // Récupérer les chambres
    $rooms = $roomModel->getAllRooms(); 

} catch (Exception $e) {
    die("❌ Erreur : " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mon_projet/public/assets/css/styles.css">

    <title>Document</title>
</head>
<body>

<?php include '../src/views/partials/header.php'; ?>


    <h1>Reservation</h1> 

    <h1>Bienvenue à notre Hôtel</h1>
    <?php if (!empty($_SESSION['user']['username'])): ?>
        <p>Bonjour, <?= htmlspecialchars($_SESSION['user']['username']) ?> !</p>
    <?php else: ?>
        <p><a href="/mon_projet/src/views/auth/login.php">Connectez-vous</a> pour réserver une chambre.</p>
    <?php endif; ?>

    <h2>Nos Chambres</h2>
    <div class="rooms">
        <?php foreach ($rooms as $room): ?>
            <div class="room">
                <h3><?= htmlspecialchars($room['name']) ?></h3>
                <img src="<?= htmlspecialchars($room['image_path']) ?>" alt="Image de <?= htmlspecialchars($room['name']) ?>">
                <p><?= htmlspecialchars($room['description']) ?></p>
                <p>Capacité : <?= htmlspecialchars($room['capacity']) ?> personnes</p>
                <p>Prix : <?= htmlspecialchars($room['price']) ?> € par nuit</p>

                <form method="POST" action="/hotel_projet/views/user/reserve.php">
                    <input type="hidden" name="room_id" value="<?= $room['id'] ?>">
                    <?php if (!empty($_SESSION['user']['username'])): ?>
                        <button type="submit">Réserver</button>
                    <?php else: ?>
                        <button type="button" onclick="alert('Veuillez vous connecter pour réserver.')">Réserver</button>
                    <?php endif; ?>
                </form>

            </div>
        <?php endforeach; ?>
    </div>

<?php include '../src/views/partials/footer.php'; ?>

</body>
</html>