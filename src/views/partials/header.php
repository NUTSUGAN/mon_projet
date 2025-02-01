<?php
// Assurez-vous que la session est démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
      
    
    <!-- La Navbar -->
    <nav class="navbar">
        <!-- Partie Gauche -->
        <div class="left-nav">
            <div class="logo">
                <img src="/hotel_projet/public/assets/logo.png" alt="Logo">
            </div>
        </div>

        <!-- Partie Centre -->
        <div class="mid-nav">
            <ul>
                <li><a href="/hotel_projet/public/index.php">Accueil</a></li>

                <!-- Menu déroulant Chambres -->
                <li class="dropdown">
                    <a href="/hotel_projet/src/views/chambres/chambre.php">Chambres</a>
                </li>

                <!-- Menu déroulant Restaurant -->
                <li class="dropdown">
                    <a href="#">Restaurant</a>
                    <ul class="dropdown-content">
                        <li><a href="/hotel_projet/src/views/restaurant/chef-equipe.php">Chef & Équipe</a></li>
                        <li><a href="/hotel_projet/src/views/restaurant/carte-vins.php">Carte des vins</a></li>
                        <li><a href="/hotel_projet/src/views/restaurant/notre-carte.php">Notre Carte</a></li>
                    </ul>
                </li>

                <!-- Menu déroulant Services -->
                <li class="dropdown">
                    <a href="/hotel_projet/public/service.php">Services</a>
                </li>
                <li><a href="/hotel_projet/src/views/contact.php">Contact</a></li>
            </ul>
        </div>

        <!-- Partie Droite -->
        <div class="right-nav">

            <?php if (!empty($_SESSION['user']['username'])): ?>
                <a href="/hotel_projet/src/views/auth/dashboard.php">Mon Profil</a>
                <a href="/hotel_projet/src/views/auth/logout.php">Déconnexion</a>
            <?php else: ?>
                <a href="/hotel_projet/src/views/auth/login.php">Connexion</a>
            <?php endif; ?>

            <a href="/hotel_projet/src/views/reservation.php" class="reservation">Réserver</a>

        </div>
    </nav>

</header>
