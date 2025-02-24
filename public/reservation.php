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
    <style>
        /* Styles généraux */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

h1, h2 {
    text-align: center;
}

/* Conteneur principal */
.container {
    width: 90%;
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
}

/* Style des catégories */
.category {
    margin-bottom: 40px;
}

/* Titre des catégories */
.category h3 {
    font-size: 24px;
    margin-bottom: 10px;
    padding-bottom: 8px;
    border-bottom: 2px solid #007bff;
}

/* Grille des chambres (3 colonnes) */
.rooms {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 colonnes égales */
    gap: 20px;
    margin-top: 20px;
}

/* Carte de chambre */
.room {
    background: #fff;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
}

.room:hover {
    transform: translateY(-5px);
    box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.15);
}

/* Image de la chambre */
.room img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 10px;
}

/* Description de la chambre */
.room p {
    margin: 8px 0;
    font-size: 14px;
}

/* Bouton de réservation */
.room button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #28a745;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
}

.room button:hover {
    background-color: #218838;
}

/* Message utilisateur */
.user-message {
    background: #f8f9fa;
    padding: 15px;
    text-align: center;
    font-size: 18px;
    border-radius: 8px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    width: 60%;
}

/* Style du texte */
.user-message p {
    margin: 0;
}

/* Lien de connexion */
.user-message a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
}

.user-message a:hover {
    text-decoration: underline;
}


/* Bouton désactivé (si l'utilisateur n'est pas connecté) */
.room button[onclick] {
    background-color: #ccc;
    cursor: not-allowed;
}



/* 🛠 Responsive : 2 colonnes sur tablette, 1 colonne sur mobile */
@media (max-width: 1024px) {
    .rooms {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .rooms {
        grid-template-columns: 1fr;
    }

    .category h3 {
        text-align: center;
    }
}

    </style>
</head>
<body>

<?php include '../src/views/partials/header.php'; ?>


    <h1>Reservation</h1> 

    <div class="user-message">
    <?php if (!empty($_SESSION['user']['username'])): ?>
        <p>Bonjour, <strong><?= htmlspecialchars($_SESSION['user']['username']) ?></strong> !</p>
    <?php else: ?>
        <p><a href="/mon_projet/src/views/auth/login.php">Connectez-vous</a> pour réserver une chambre.</p>
    <?php endif; ?>
</div>

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