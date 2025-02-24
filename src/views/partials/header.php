<?php
// Assurez-vous que la session est démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


<style>

     /* Bouton "Réserver" */
.reservation {
    display: inline-block;
    background-color:rgb(225, 192, 134); /* Bleu principal */
    color: #fff; /* Texte en blanc */
    padding: 12px 20px; /* Espace intérieur */
    font-size: 16px; /* Taille du texte */
    font-weight: bold;
    border-radius: 20px; /* Bord arrondi */
    text-decoration: none; /* Supprimer le soulignement */
    transition: background 0.3s ease, transform 0.2s ease;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Ombre légère */
}

/* Effet au survol */
.reservation:hover {
    background-color:rgb(73, 153, 200); /* Bleu plus foncé */
    transform: translateY(-2px); /* Légère élévation */
}

/* Effet au clic */
.reservation:active {
    background-color: #004494;
    transform: scale(0.95);
}

</style>

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
                <a href="/mon_projet/src/Views/user/user.php">Mon Profil</a>
                <a href="/mon_projet/src/Views/Auth/logout.php">Déconnexion</a>
            <?php else: ?>
                <a href="/mon_projet/src/Views/Auth/login.php">Connexion</a>
            <?php endif; ?>

            <a href="/mon_projet/public/reservation.php" class="reservation">Réserver</a>

        </div>
    </nav>

</header>
