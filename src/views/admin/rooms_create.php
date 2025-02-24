<?php
session_start();

use Controllers\RoomController;

require_once __DIR__ . '/../../../vendor/autoload.php'; // Charger l'autoloader

$roomController = new RoomController();
$errorMsg = "";

if ($_SESSION['user']['role'] !== 'admin') {
    header('Location: ../../../public/index.php'); // Redirection si ce n'est pas un admin
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les champs du formulaire
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $capacity = (int) $_POST['capacity'];
    $price = (float) $_POST['price'];
    $imagePath = trim($_POST['image_path']); // L'utilisateur entre directement l'URL

    // Vérifier que tous les champs sont remplis
    if (!empty($name) && !empty($description) && $capacity > 0 && $price > 0 && !empty($imagePath)) {
        if ($roomController->createRoom($name, $description, $capacity, $price, $imagePath)) {
            header('Location: ../../../public/index.php?success=1');
            exit;
        } else {
            $errorMsg = "Erreur lors de la création de la chambre en base de données.";
        }
    } else {
        $errorMsg = "Tous les champs sont obligatoires.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une chambre</title>
    <style>
        /* Styles globaux */
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
.container {
    width: 50%;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    text-align: center;
}

/* Titre */
h1 {
    color: #333;
    margin-bottom: 20px;
}

/* Formulaire */
form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

/* Champs du formulaire */
input, textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

/* Champ de texte (textarea) */
textarea {
    height: 100px;
    resize: none;
}

/* Bouton de soumission */
button {
    background:rgb(68, 139, 136);
    color: white;
    font-size: 18px;
    padding: 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease-in-out;
}

button:hover {
    background-color: #218838;
}

/* Message d'erreur */
.error-message {
    color: red;
    font-weight: bold;
    margin-bottom: 15px;
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


    <div class="container">
        <h1>Créer une chambre</h1>
        
        <?php if (!empty($errorMsg)): ?>
            <p class="error-message"><?= htmlspecialchars($errorMsg) ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="name" placeholder="Nom de la chambre" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <input type="number" name="capacity" placeholder="Capacité" required>
            <input type="number" step="0.01" name="price" placeholder="Prix par nuit" required>
            <input type="text" name="image_path" placeholder="URL de l'image" required>
            <button type="submit">Créer</button>
        </form>
    </div>

<footer>
    <div class="out">
      <a href="/mon_projet/src/Views/Auth/logout.php">Déconnexion</a>
    </div>
</footer>
</body>

</html>
