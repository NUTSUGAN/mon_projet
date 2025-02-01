<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/contact.css">
    <title>Contact</title>
</head>
<body>

    <!-- La Navbar -->
    <nav class="navbar">
            
        <!-- Partie Gauche -->
        <div class="left-nav">
            <div class="logo">
                <img src="assets/logo.png" alt="Logo">
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
                        <li><a href="carte-restaurant.html">Notre Carte</a></li>
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
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>

        <!-- Partie Droite -->
        <div class="right-nav">
            <a href="login.html" class="login">Connexion</a>
            <a href="reservation.html" class="reservation">Réserver</a>
        </div>
    </nav>

    <!-- Partie top section avec image  -->
    <div class="top-section">
        <div class="content">
            <h1>Nous contacter</h1>
            <p>Nous sommes là pour répondre à toutes vos questions. N'hésitez pas à nous écrire !</p>
        </div>
    </div>

   

    <div class="container">
           
        <!-- Form Section -->
        <div class="form-section">
            <h3>Contactez-nous</h3>
            <form action="traitement_contact.php" method="post">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>

                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" required>

                <label for="entreprise">Entreprise (facultatif)</label>
                <input type="text" id="entreprise" name="entreprise">

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="pays">Pays</label>
                <select id="pays" name="pays" required>
                    <option value="">-- Sélectionnez votre pays --</option>
                    <option value="France">France</option>
                    <option value="Belgique">Belgique</option>
                    <option value="Suisse">Suisse</option>
                    <option value="Canada">Canada</option>
                    <option value="Autre">Autre</option>
                </select>

                <label for="sujet">Sujet</label>
                <input type="text" id="sujet" name="sujet" required>

                <label for="message">Message</label>
                <textarea id="message" name="message" required></textarea>

                <!-- Radio Button Group -->
                <div class="radio-group">
                    <input type="radio" id="confirmation" name="confirmation" value="agree"  required>
                    <label for="confirmation">Je confirme que les informations saisies sont exactes et j'accepte les conditions générales*</label>
                </div>

                <button type="submit">Envoyer</button>
            </form>
        </div>

        <!-- Map Section -->
        <div class="map-section">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2888.920266367494!2d-0.57918!3d44.837789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4800000000000001%3A0x6fbc1a25d8d5c90e!2sBordeaux!5e0!3m2!1sfr!2sfr!4v1672678617653!5m2!1sfr!2sfr"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>
    </div>

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