<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Raleway:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/chambre.css">
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
                <h1>Nos Chambres</h1>
                <p>Découvrez nos chambres !</p>
                <a href="reservation.html" class="btn-vins">Réservez maintenant</a>
            </div>
        </div>
    </header>


    <!--------------- 1ER IMAGE Deuxième page  --------------->
    <section class="presentation-spa">
        <div class="left-page">
            <div class="left-box">
                <!-- Top Message -->
                <div class="content-top">
                    <h1>CHAMBRE CLASSIQUE</h1>                   
                </div>
                <!-- Mid Message -->
                <div class="content-mid">
                    <h2>L’ÉLÉGANCE DANS <br>
                        LA SIMPLICITÉ
                    </h2>
                </div>
                <!-- Bottom Message -->
                 <div class="content-bottom">
                    <h3>Nichée au cœur de La Flèche d'Argent, la chambre classique allie confort et raffinement dans un cadre chaleureux. Chaque détail a été soigneusement pensé pour offrir un espace reposant, mêlant charme authentique et touches contemporaines. Ses matériaux nobles et ses lignes épurées invitent à la sérénité et au bien-être, tout en reflétant l’élégance intemporelle du lieu.
                        <br><br>              
                        Bienvenue dans un écrin de douceur, pensé pour votre quiétude et votre plaisir.</h3>
                 </div>
            </div>
        </div>

        <!-- Partie droite image SPA -->
        <div class="right-page">
            <div class="right-box"></div>
        </div>
    </section>

    <!------------- 2E PAGE Troisième Page ---------------->
    <section class="presentation-restaurant">
        <div class="left-page-r">
            <div class="left-box-r"></div>
        </div>

        <div class="right-page-r">
            <div class="right-box-r">
                <div class="content-top-r">
                    <h1>Chambre Confort</h1>                   
                </div>
                <div class="content-mid-r">
                    <h2>LE CHARME D'UN<br>
                        REFUGE INTIMISTE
                    </h2>
                </div>
                <!-- Bottom Message -->
                <div class="content-bottom-r">
                    <h3>Spacieuse et lumineuse, la chambre confort est une invitation à la détente et au bien-être. Ses teintes apaisantes, ses matières douces et son mobilier élégant créent une atmosphère harmonieuse, idéale pour se ressourcer. Alliant confort moderne et esthétique raffinée, elle offre un espace où chaque détail est pensé pour rendre votre séjour inoubliable.
                        <br><br>
                        Conçue pour offrir un confort absolu, la chambre confort allie élégance et modernité. Ses espaces généreux et son ambiance chaleureuse invitent à la relaxation, tandis que son équipement haut de gamme garantit un séjour des plus agréables. Chaque élément a été soigneusement choisi pour créer un cocon où le luxe se mêle à la simplicité.
                        <br><br>
                        Bienvenue dans un havre de paix, conçu pour sublimer votre expérience.
                    </h3>
                 </div>
            </div>
        </div>
    </section>

    <!--------------- 3E IMAGE Quatrième page STANDING  --------------->
    <section class="presentation-spa">
        <div class="left-page">
            <div class="left-box">
                <!-- Top Message -->
                <div class="content-top">
                    <h1>CHAMBRE STANDING</h1>                   
                </div>
                <!-- Mid Message -->
                <div class="content-mid">
                    <h2>L’HARMONIE ENTRE LUXE<br>
                        ET MODERNITÉ
                    </h2>
                </div>
                <!-- Bottom Message -->
                 <div class="content-bottom">
                    <h3>Offrant un espace généreux et lumineux, la chambre Standing est une véritable ode au confort et au raffinement. Avec des finitions haut de gamme et une décoration contemporaine, elle reflète parfaitement l’élégance intemporelle de La Flèche d’Argent. Son mobilier design et ses équipements modernes garantissent une expérience exceptionnelle, idéale pour se détendre et profiter pleinement de chaque instant.
                        <br><br>              
                        Bienvenue dans un lieu où chaque détail célèbre l’art de recevoir avec finesse.</h3>
                 </div>
            </div>
        </div>

        <!-- Partie droite image SPA -->
        <div class="right-page-x">
            <div class="right-box-x"></div>
        </div>
    </section>

    <!------------- 4E IMAGE Cinquième Page SUITE ---------------->
    <section class="presentation-restaurant">
        <div class="left-page-s">
            <div class="left-box-s"></div>
        </div>

        <div class="right-page-r">
            <div class="right-box-r">
                <div class="content-top-r">
                    <h1>NOTRE SUITE</h1>                   
                </div>
                <div class="content-mid-r">
                    <h2>L’EXCELLENCE DANS<br>
                        CHAQUE DÉTAIL
                    </h2>
                </div>
                <!-- Bottom Message -->
                <div class="content-bottom-r">
                    <h3>La Suite de La Flèche d’Argent incarne l’apogée du luxe et du confort. Avec ses espaces vastes et lumineux, sa décoration raffinée et ses matériaux nobles, elle offre un cadre exceptionnel pour un séjour inoubliable.
                        <br><br>
                        Dotée d’un salon privé et d’une terrasse avec jacuzzi, elle conjugue à la perfection intimité, élégance et modernité. Chaque instant passé dans la Suite devient une expérience unique.
                        <br><br>
                        Bienvenue dans un espace d’exception, conçu pour sublimer votre séjour.
                    </h3>
                 </div>
            </div>
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
                    <a href="#"><img src="assets/facebook-icon 1.png" alt="Facebook"></a>
                    <a href="#"><img src="assets/Instagram-Logo-Transparent-Image.png" alt="Instagram"></a>
                </div>
               
                <div class="logo">
                    <img src="/frontend/assets/LOGO 3.png" alt=" Entrprise">
                   
                </div>
            </div>
        </div>
    </footer>
    








    <h1>Bienvenue à notre Hôtel</h1>
    <?php if (!empty($_SESSION['user']['username'])): ?>
        <p>Bonjour, <?= htmlspecialchars($_SESSION['user']['username']) ?> !</p>
    <?php else: ?>
        <p><a href="/hotel_projet/views/auth/login.php">Connectez-vous</a> pour réserver une chambre.</p>
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








</body>
</html>