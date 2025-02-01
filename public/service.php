<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Raleway:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/frontend/css/swiper-bundle.min.css" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
    <title>Nos Services</title>
    <link rel="stylesheet" href="css/service.css">
</head>
</head>
<body>
    <header>
        <!-- La Navbar -->
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
                        <a href="chambre.html">Chambres</a>
                        <ul class="dropdown-content">
                            <li><a href="chambre.html">Classique</a></li>
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
                            <li><a href="notre-carte.html">Notre Carte</a></li>
                        </ul>
                    </li>
                    <!-- Menu déroulant Services -->
                    <li class="dropdown">
                        <a href="service.html">Services</a>
                        <ul class="dropdown-content">
                            <li><a href="#">Gommage corps en cabine</a></li>
                            <li><a href="#">Massage relaxant aux huiles essentielles</a></li>
                            <li><a href="#">Massage tonique</a></li>
                            <li><a href="#">Massage balinais</a></li>
                            <li><a href="#">Massage aux pierres chaudes</a></li>
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
        <div class="top-section">
            <div class="content">
                <h1>Nos Services</h1>
                <p>Un séjour inoubliable dans un cadre luxueux.</p>
            </div>
        </div>
    </header>

    <h2>BORDEAUX EN FAMILLE</h2>

    <section class="slider">
        <div class="slider-container">
            <!-- Slides -->
            <div class="service-item">
                <img src="assets/gommage-corp.jpg" alt="Gommage corps en cabine">
                <h2>Gommage corps en cabine</h2>
                <p>Offrez à votre peau un gommage complet en cabine pour une douceur absolue.</p>
                
            </div>
            <div class="service-item">
                <img src="assets/massage-relaxant.jpeg" alt="Massage relaxant">
                <h2>Massage relaxant</h2>
                <p>Détendez-vous avec un massage relaxant aux huiles essentielles.</p>
            </div>
            <div class="service-item">
                <img src="assets/massage-tonique.jpg" alt="Massage tonique">
                <h2>Massage tonique</h2>
                <p>Revigorez votre corps avec notre massage tonique revitalisant.</p>
            </div>
            <div class="service-item">
                <img src="assets/massage-balinais.jpg" alt="Massage balinais">
                <h2>Massage balinais</h2>
                <p>Un massage traditionnel balinais pour une relaxation profonde.</p>
            </div>
            <div class="service-item">
                <img src="assets/massage-pierre.jpg" alt="Massage aux pierres chaudes">
                <h2>Massage aux pierres chaudes</h2>
                <p>Profitez d’un massage apaisant aux pierres chaudes pour détendre vos muscles.</p>
            </div>
            <div class="service-item">
                <img src="assets/soins-visage.jpg" alt="Soin visage hydratant">
                <h2>Soin visage hydratant</h2>
                <p>Hydratez et revitalisez votre peau avec notre soin visage.</p>
            </div>
        </div>
    
        <!-- Boutons de navigation -->
        <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="next" onclick="changeSlide(1)">&#10095;</button>
    </section>
    

    <section class="services-section">
    
    
    <!-- Section Image -->
    <section class="image-section">
        <h2>LA FLÊCHE D'ARGENT</h2>
        <img src="assets/background4.jpg" alt="Famille à Paris">
        <p>Voyagez ensemble. Nous organisons des itinéraires soigneusement conçus pour maximiser les expériences des enfants et des familles tout en explorant Paris.</p>
    </section>
    
    <!-- Commodités Enfants -->
    <section class="family-section">
        <h2>PLUS DE COMMODITÉS POUR LES ENFANTS</h2>
        <hr>
        <div class="commodities">
            <div>Commodités de bienvenue pour enfants</div>
            <div>Articles de toilette pour bébés et enfants</div>
            <div>Itinéraires privés, en dehors des sentiers battus</div>
            <div>Itinéraires parisiens personnalisés pour les familles</div>
            <div>Livres de coloriage, crayons et jeux gratuits</div>
        </div>
    </section>
</section>

    <footer>
        <div class="footer-content">
 
            <h2>Recevez nos dernières offres et actualités</h2>
            <a href="#">INSCRIVEZ-VOUS </a>
 
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


    <script>
        
        
        let currentSlide = 0;

            function updateSlideVisibility() {
                const slides = document.querySelectorAll('.service-item');
                const sliderContainer = document.querySelector('.slider-container');
                const totalSlides = slides.length;
            
                // Ajout dynamique de la classe active et réinitialisation des styles
                slides.forEach((slide, index) => {
                    if (index === currentSlide) {
                        slide.classList.add('active'); // Mise en avant
                        slide.style.opacity = "1";
                        slide.style.transform = "scale(1.2)";
                    } else {
                        slide.classList.remove('active'); // Réinitialisation
                        slide.style.opacity = "0.5";
                        slide.style.transform = "scale(0.9)";
                    }
                });
            
                // Calcule l'offset pour centrer la slide active
                const slideWidth = slides[0].offsetWidth; // Largeur d'une seule slide
                const offset = -(currentSlide * slideWidth) + sliderContainer.offsetWidth / 3; // Centre la slide
                sliderContainer.style.transform = `translateX(${offset}px)`;
                sliderContainer.style.transition = "transform 0.5s ease";
            }
            
            function changeSlide(step) {
                const slides = document.querySelectorAll('.service-item');
                const totalSlides = slides.length;
            
                // Mise à jour de la slide actuelle avec boucle circulaire
                currentSlide += step;
                if (currentSlide >= totalSlides) {
                    currentSlide = 0;
                } else if (currentSlide < 0) {
                    currentSlide = totalSlides - 1;
                }
            
                updateSlideVisibility();
            }
            
            // Initialisation : Affiche la première slide
            updateSlideVisibility();
            

    </script>
</body>
</html>