

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
    <link rel="stylesheet" href="/mon_projet/public/assets/css/service.css">    <title>Carte des vins</title>
</head>
<body>

<?php include '../src/views/partials/header.php'; ?>

    <header>
        <div class="top-section">
            <div class="content">
                <h1>Nos Services</h1>
                <p>Un séjour inoubliable dans un cadre luxueux.</p>
                <a href="/mon_projet/public/reservation.php" class="btn">Réserver maintenant</a>

            </div>
        </div>
    </header>

    <h2>BORDEAUX EN FAMILLE</h2>

    <section class="slider">
        <div class="slider-container">
            <!-- Slides -->
            <div class="service-item">
                <img src="../public/assets/images/gommage-corp.jpg" alt="Gommage corps en cabine">
                <h2>Gommage corps en cabine</h2>
                <p>Offrez à votre peau un gommage complet en cabine pour une douceur absolue.</p>
                
            </div>
            <div class="service-item">
                <img src="../public/assets/images/massage-relaxant.jpeg" alt="Massage relaxant">
                <h2>Massage relaxant</h2>
                <p>Détendez-vous avec un massage relaxant aux huiles essentielles.</p>
            </div>
            <div class="service-item">
                <img src="../public/assets/images/massage-tonique.jpg" alt="Massage tonique">
                <h2>Massage tonique</h2>
                <p>Revigorez votre corps avec notre massage tonique revitalisant.</p>
            </div>
            <div class="service-item">
                <img src="../public/assets/images/massage-balinais.jpg" alt="Massage balinais">
                <h2>Massage balinais</h2>
                <p>Un massage traditionnel balinais pour une relaxation profonde.</p>
            </div>
            <div class="service-item">
                <img src="../public/assets/images/massage-pierre.jpg" alt="Massage aux pierres chaudes">
                <h2>Massage aux pierres chaudes</h2>
                <p>Profitez d’un massage apaisant aux pierres chaudes pour détendre vos muscles.</p>
            </div>
            <div class="service-item">
                <img src="../public/assets/images/soins-visage.jpg" alt="Soin visage hydratant">
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
        <img src="../public/assets/images/background4.jpg" alt="Famille à Paris">
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


<?php include '../src/views/partials/footer.php'; ?>


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