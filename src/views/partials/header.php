<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<style>
/* ============ NAVBAR GÉNÉRALE ============ */
.navbar {
    width: 100%;
    height: 12vh;
    background-color: rgb(246, 234, 234);
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 5%;
    box-sizing: border-box;
    position: relative;
}

/* ============ LOGO ============ */
.logo img {
    width: 90px;
    height: auto;
}

/* ============ MENU NORMAL (desktop) ============ */
.mid-nav {
    flex: 1;
    display: flex;
    justify-content: center;
}

.mid-nav ul {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
}

.mid-nav ul li {
    position: relative;
    margin: 0 15px;
}

.mid-nav a {
    text-decoration: none;
    color: black;
    font-weight: 400;
    padding: 10px 20px;
    transition: color 0.3s ease;
    font-family: 'Raleway', sans-serif;
}

.mid-nav a:hover {
    color: #efa507;
}

/* ============ DROPDOWN MENU ============ */
/* Empêcher le menu déroulant d'être trop éloigné */
.dropdown {
    position: relative;
}

/* Gérer le dropdown pour qu'il reste aligné */
.dropdown-content {
    opacity: 0;
    visibility: hidden;
    position: absolute;
    top: 100%;
    left: 0;
    width: max-content; /* Ajuste la largeur en fonction du contenu */
    background-color: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    padding: 10px 0;
    border-radius: 5px;
    transition: opacity 0.3s ease, visibility 0.3s ease;
    display: flex;
    flex-direction: column;
    gap: 5px;
}


/* Quand on clique, le menu devient visible */
.dropdown-content.active {
    opacity: 1;
    visibility: visible;
}

.dropdown:hover .dropdown-content {
    opacity: 1;
    visibility: visible;
}

/* ============ MENU BURGER ============ */
.burger-menu {
    display: none;
    flex-direction: column;
    cursor: pointer;
    padding: 10px;
    z-index: 2000;
}

.burger-menu .bar {
    width: 30px;
    height: 4px;
    background-color: black;
    margin: 5px 0;
    transition: all 0.3s ease;
}

/* ============ MENU MOBILE (s'affiche sur clic) ============ */
.mobile-nav {
    display: none;
    position: absolute;
    top: 12vh;
    left: 0;
    width: 100%;
    background-color: white;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    padding: 15px 0;
    text-align: center;
    z-index: 1500;
}

.mobile-nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.mobile-nav ul li {
    margin: 10px 0;
}

.mobile-nav a {
    text-decoration: none;
    color: black;
    font-size: 18px;
    font-weight: 400;
    display: block;
    padding: 10px 0;
    font-family: 'Raleway', sans-serif;
}

.mobile-nav a:hover {
    color: #efa507;
}




/* Partie Droite */
.right-nav {
    width: 13%;
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


/* Par défaut, on cache l'icône sur desktop */
.mobile-icon {
    display: none;
}


/* ============ RESPONSIVE DESIGN ============ */
@media screen and (max-width: 1024px) {
    .mid-nav {
        display: none;
    }

    .burger-menu {
        display: flex;
    }

    .mobile-nav {
        display: none;
        flex-direction: column;
    }

    .mobile-nav.active {
        display: flex;
    }

    .dropdown {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .dropdown-content {
        position: static; /* Supprime le positionnement absolu */
        display: none;
        opacity: 1;
        visibility: visible;
        width: 100%; /* S'assure que le dropdown reste bien aligné */
        text-align: center;
    }

    .dropdown-content a {
        color: #efa507;
    }

    .dropdown-content.active {
        display: flex; /* Affiche les sous-menus bien alignés */
    }

    .desktop-text {
        display: none;
    }
    .mobile-icon {
        display: inline;
    }
}
</style>

<header>
    <nav class="navbar">
        <!-- Logo -->
        <div class="left-nav">
            <a href="index.php">
                <div class="logo">
                    <img src="/mon_projet/public/assets/images/logo.png" alt="Logo">
                </div>
            </a>
        </div>

        <!-- Navigation normale (desktop) -->
        <div class="mid-nav">
            <ul>
                <li><a href="/mon_projet/public/index.php">Accueil</a></li>
                <li><a href="/mon_projet/public/chambre.php">Chambres</a></li>
                <li class="dropdown">
                    <a href="#">Restaurant</a>
                    <ul class="dropdown-content">
                        <li><a href="/mon_projet/public/chef-equipe.php">Chef & Équipe</a></li>
                        <li><a href="/mon_projet/public/carte-vins.php">Carte des vins</a></li>
                        <li><a href="/mon_projet/public/notre-carte.php">Notre Carte</a></li>
                    </ul>
                </li>
                <li><a href="/mon_projet/public/service.php">Services</a></li>
                <li><a href="/mon_projet/public/contact.php">Contact</a></li>
            </ul>
        </div>

        <!-- Section droite -->
        <div class="right-nav">
                <?php if (!empty($_SESSION['user']['username'])): ?>
            <a href="/mon_projet/src/Views/user/user.php">Mon Profil</a>
            <a href="/mon_projet/src/Views/Auth/logout.php" class="out">
                <span class="desktop-text">Déconnexion</span>
                <span class="mobile-icon">🔓</span> <!-- Icône de déconnexion -->
            </a>
            <?php else: ?>
                <a href="/mon_projet/src/Views/Auth/login.php">Connexion</a>
            <?php endif; ?>
            <a href="/mon_projet/public/reservation.php" class="reservation">Réserver</a>

        </div>

        <!-- Menu Burger -->
        <div class="burger-menu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>

        <!-- Menu Mobile -->
        <div class="mobile-nav">
            <ul>
                <li><a href="/mon_projet/public/index.php">Accueil</a></li>
                <li><a href="/mon_projet/public/chambre.php">Chambres</a></li>

                <li class="dropdown">
                    <a href="#">Restaurant</a>
                    <ul class="dropdown-content">
                        <li><a href="/mon_projet/public/chef-equipe.php">Chef & Équipe</a></li>
                        <li><a href="/mon_projet/public/carte-vins.php">Carte des vins</a></li>
                        <li><a href="/mon_projet/public/notre-carte.php">Notre Carte</a></li>
                    </ul>
                </li>                
                
                <li><a href="/mon_projet/public/service.php">Services</a></li>
                <li><a href="/mon_projet/public/contact.php">Contact</a></li>
            </ul>
        </div>
    </nav>
</header>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const burger = document.querySelector(".burger-menu");
    const mobileNav = document.querySelector(".mobile-nav");
    const dropdownLinks = document.querySelectorAll(".dropdown > a");

    // Gestion du menu burger
    burger.addEventListener("click", function () {
        mobileNav.classList.toggle("active");
    });

    // Gestion du menu déroulant "Restaurant"
    dropdownLinks.forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault(); // Empêche la navigation
            const dropdownMenu = this.nextElementSibling; // Sélectionne le menu déroulant lié

            // Fermer les autres menus avant d'ouvrir un autre
            document.querySelectorAll(".dropdown-content").forEach(menu => {
                if (menu !== dropdownMenu) {
                    menu.classList.remove("active");
                }
            });

            dropdownMenu.classList.toggle("active"); // Affiche ou cache le menu
        });
    });
});


</script>
