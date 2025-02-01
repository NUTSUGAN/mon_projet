<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Raleway:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/notre-carte.css">
    <title>Carte des vins</title>
</head>
<body>
    <header>
        <!----------------- La Navbar ----------------------->
        <nav class="navbar">
            
            <!-- Partie Gauche -->
            <div class="left-nav">
                <div class="logo">
                    <img src="/frontend/assets/logo.png" alt="Logo">
                </div>
            </div>

            <!-- Partie Centre -->
            <div class="mid-nav">
                <ul>
                    <li><a href="index.html">Accueil</a></li>

                    <!-- Menu déroulant Chambres -->
                    <li class="dropdown">
                        <a href="#">Chambres</a>
                        <ul class="dropdown-content">
                            <li><a href="chambres-classique.html">Classique</a></li>
                            <li><a href="chambres-confort.html">Confort</a></li>
                            <li><a href="chambres-standing.html">Standing</a></li>
                            <li><a href="chambres-suite.html">Suite</a></li>
                        </ul>
                    </li>
                    <!-- Menu déroulant Restaurant -->
                    <li class="dropdown">
                        <a href="#">Restaurant</a>
                        <ul class="dropdown-content">
                            <li><a href="chef-equipe.html">Chef & Equipe</a></li>
                            <li><a href="carte-vins.html">Carte des vins</a></li>
                            <li><a href="carte-restaurant.html">Carte restaurant</a></li>
                        </ul>
                    </li>
                    <!-- Menu déroulant Services -->
                    <li class="dropdown">
                        <a href="#">Services</a>
                        <ul class="dropdown-content">
                            <li><a href="gommage.html">Gommage corps en cabine</a></li>
                            <li><a href="massage-huiles.html">Massage relaxant aux huiles essentielles</a></li>
                            <li><a href="massage-tonique.html">Massage tonique</a></li>
                            <li><a href="massage-balinais.html">Massage balinais</a></li>
                            <li><a href="pierres-chaudes.html">Massage aux pierres chaudes</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Contact</a></li> 
                </ul>
            </div>

            <!-- Partie Droite -->
            <div class="right-nav">
                <a href="login.html" class="login">Connexion</a>
                <a href="reservation.html" class="reservation">Réserver</a>
            </div>
        </nav>

        <!------------------------ Partie top section avec image  ------------------->
        <div class="top-section-vins">
            <div class="content-vins">
                <h1>Notre Carte</h1>
                <p>Découvrez notre carte de menus !</p>
                <a href="reservation.html" class="btn-vins">Réservez maintenant</a>
            </div>
        </div>
    </header>
    

     <!----------------- Deuxième Page Carte ---------------------->

     <section class="global-carte-vins">
        <div class="top-section3">
            <h1>NOTRE CARTE</h1>
            <div class="undertitle">
                <h3>La Flèche d'Argent : Découvrez notre carte dans un cadre élégant et prestigieux.</h3>

            </div>
        </div>

        <div class="global-section3">
            <div class="left-section3"></div>            
        </div>
     </section>


     <!-- Le footer -->
     <footer>
        <div class="footer-content">
 
            <h2>Recevez nos dernières offres et actualités</h2>
            <a href="#">INSCRIVEZ-VOUS ></a>
 
            <div class="info">
                <h4>LA FLÊCHE D'ARGENT</h4>
                <h6>HOTEL ET RESTAURANT <br>
                    &copy;BORDEAUX</h6>
       
                <p>42 avenue Gabriel, 33300 Bordeaux | +33 1 58 36 60 60 | reservations@lapechedargent.com</p>
            </div>
 
            <div class="privacy">
                <a href="#">PROTECTION DES DONNÉES</a> | <a href="#">CONDITIONS GÉNÉRALES</a>
            </div>
 
            <div class="separator"></div>
 
           
            <div class="divs-container">
                <div class="privacy">
                   
                    <h6>© Copyright 2020-2025 LA FLÊCHE D'ARGENT <br>
                        Web design & Web development by IPSSI STUDENTS</h6>
                </div>
               
                <div class="socials">
                    <a href="#"><img src="/frontend/assets/facebook-icon 1.png" alt="Facebook"></a>
                    <a href="#"><img src="/frontend/assets/Instagram-Logo-Transparent-Image.png" alt="Instagram"></a>
                </div>
               
                <div class="logo">
                    <img src="/frontend/assets/LOGO 3.png" alt=" Entrprise">
                   
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>