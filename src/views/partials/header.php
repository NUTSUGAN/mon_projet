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
            <a href="index.php">
                <div class="logo">
                    <img src="/mon_projet/public/assets/images/logo.png" alt="Logo">
                </div>
            </a>
        </div>

        <!-- Partie Centre -->
        <div class="mid-nav">
            <ul>
                <li><a href="/mon_projet/public/index.php">Accueil</a></li>

                <!-- Menu déroulant Chambres -->
                <li class="dropdown">
                    <a href="/mon_projet/public/chambre.php">Chambres</a>
                </li>

                <!-- Menu déroulant Restaurant -->
                <li class="dropdown">
                    <a>Restaurant</a>
                    <ul class="dropdown-content">
                        <li><a href="/mon_projet/public/chef-equipe.php">Chef & Équipe</a></li>
                        <li><a href="/mon_projet/public/carte-vins.php">Carte des vins</a></li>
                        <li><a href="/mon_projet/public/notre-carte.php">Notre Carte</a></li>
                    </ul>
                </li>

                <!-- Menu déroulant Services -->
                <li class="dropdown">
                    <a href="/mon_projet/public/service.php">Services</a>
                </li>
                <li><a href="/mon_projet/public/contact.php">Contact</a></li>
            </ul>
        </div>

        <!-- Partie Droite -->
        <div class="right-nav">

            <?php if (!empty($_SESSION['user']['username'])): ?>
                <a href="/mon_projet/public/auth/dashboard.php">Mon Profil</a>
                <a href="/mon_projet/src/Views/Auth/logout.php">Déconnexion</a>
            <?php else: ?>
                <a href="/mon_projet/src/Views/Auth/login.php">Connexion</a>
            <?php endif; ?>

            <a href="/mon_projet/public/reservation.php" class="reservation">Réserver</a>

        </div>
    </nav>

</header>
