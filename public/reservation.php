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

    <?php if (!empty($_SESSION['user']['username'])): ?>
        <p>Bonjour, <?= htmlspecialchars($_SESSION['user']['username']) ?> !</p>
    <?php else: ?>
        <p><a href="/mon_projet/src/views/auth/login.php">Connectez-vous</a> pour réserver une chambre.</p>
    <?php endif; ?>
    <h2>Nos Chambres</h2>

<?php
// Initialisation des catégories avec descriptions
$categories = [
    'Chambres Standard' => [
        'rooms' => []
    ],
    'Chambres Classiques' => [
        'rooms' => []
    ],
    'Chambres Premium' => [
        'rooms' => []
    ]
];

// Classer les chambres selon leur prix
foreach ($rooms as $room) {
    if ($room['price'] < 101) {
        $categories['Chambres Standard']['rooms'][] = $room;
    } elseif ($room['price'] >= 101 && $room['price'] <= 500) {
        $categories['Chambres Classiques']['rooms'][] = $room;
    } else {
        $categories['Chambres Premium']['rooms'][] = $room;
    }
}

// Afficher les chambres par catégorie avec titre et description
foreach ($categories as $category => $data):
    if (!empty($data['rooms'])): ?>
        <h3><?= htmlspecialchars($category) ?></h3>

        <div class="rooms">
            <?php foreach ($data['rooms'] as $room): ?>
                <div class="room">
                    <h3><?= htmlspecialchars($room['name']) ?></h3>
                    <img src="<?= htmlspecialchars($room['image_path']) ?>" alt="Image de <?= htmlspecialchars($room['name']) ?>">
                    <p><?= htmlspecialchars($room['description']) ?></p>
                    <p>Capacité : <?= htmlspecialchars($room['capacity']) ?> personnes</p>
                    <p>Prix : <?= htmlspecialchars($room['price']) ?> € par nuit</p>

                    <form method="POST" action="/mon_projet/src/views/user/reserve.php">
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
    <?php endif;
endforeach;
?>

    </div>

<?php include '../src/views/partials/footer.php'; ?>

</body>
</html>