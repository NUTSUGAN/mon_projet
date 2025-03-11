<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Swiper.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <link rel="stylesheet" href="css/swiper-bundle.min.css" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/mon_projet/public/assets/css/styles.css">
    <title>La Flèche d'Argent</title>

</head>
<body>

<?php include '../src/views/partials/header.php'; ?>

    <header>
    <!-- Partie top section avec image -->
    <div class="top-section">
        <div class="content">
            <h1>Bienvenue à La Flèche d'Argent</h1>
            <p>Un séjour inoubliable dans un cadre luxueux.</p>
            <a href="/mon_projet/public/reservation.php" class="btn">Réserver maintenant</a>
        </div>
    </div>
    </header>

     <!--------------- Deuxième page  --------------->
     <section class="presentation-spa">
        <div class="left-page">
            <div class="left-box">
                <!-- Top Message -->
                <div class="content-top">
                    <h1>LES ATTENTIONS D'UN PALACE</h1>                   
                </div>
                <!-- Mid Message -->
                <div class="content-mid">
                    <h2>LA CHALEUR D'UNE<br>
                        MAISON DE FAMILLE
                    </h2>
                </div>
                <!-- Bottom Message -->
                 <div class="content-bottom">
                    <h3>C’est au cœur des vignes du Château Smith Haut Lafitte, Grand Cru Classé de Graves, que naissent Les Sources de Caudalie.
                        Entre vignes et forêts, aux portes de Bordeaux, Alice et Jérôme Tourbier ont imaginé un ensemble en totale harmonie avec l’environnement proche.         
                        Cette conception contemporaine enrichie de matériaux et de structures récupérés dans la région et recyclés, fait de cette maison un lieu dédié à l’art de vivre au cœur des vignes.
                        <br><br>              
                        Bienvenue dans un lieu au service de la nature, du goût et des sens.</h3>
                 </div>
            </div>
        </div>

        <!-- Partie droite image SPA -->
        <div class="right-page">
            <div class="right-box"></div>
        </div>
    </section>


    <!------------- Troisième Page ----------------->
    <section class="presentation-chambres">
        <div class="top-section3">
            <h1>NOS CHAMBRES</h1>
            <div class="undertitle">
                <h3>La Flèche d'Argent : </h3> 
                <hr>
                     l'élégance intemporelle au cœur d'un cadre raffiné et prestigieux.</h3>

            </div>
        </div>

        <div class="global-section3">
            <div class="left-section3"></div>    
            <div class="right-section3"></div>
            <div class="mid-section3">
                <div class="text-content3">
                    <h3>Hôtel de luxe dans le centre de Bordeaux, La Flèche d'Argent vous plonge dans un univers élégant et raffiné. Un cocon qui entrelace design contemporain et prestige de l’ancien.
                        Découvrez ses 28 chambres et suites de 25 à 100m2, avec terrasses privatives dotées de jacuzzis.</h3>
                </div>
                <div class="btn-plus3">
                    <a href="/mon_projet/public/reservation.php" class="btn-content3">VOIR PLUS</a>
                </div>
            </div>
        </div>
    </section>


    <!------------- Quatrième Page ---------------->
    <section class="presentation-restaurant">
        <div class="left-page-r">
            <div class="left-box-r"></div>
        </div>

        <div class="right-page-r">
            <div class="right-box-r">
                <div class="content-top-r">
                    <h1> LA PASSION DE LA GASTRONOMIE</h1>                   
                </div>
                <div class="content-mid-r">
                    <h2>LA CHALEUR D'UNE<br>
                        TABLE CONVIVIAL
                    </h2>
                </div>
                <!-- Bottom Message -->
                <div class="content-bottom-r">
                    <h3>C’est au cœur des saveurs de la région que notre restaurant prend vie. Inspiré par les produits locaux, nos chefs s’engagent à sublimer chaque ingrédient
                        dans une harmonie parfaite entre tradition et créativité. Chaque plat raconte une histoire,
                        celle d’un terroir riche, et d’un savoir-faire transmis avec amour et passion.
                        <br><br>
                        Derrière chaque assiette se cache une équipe passionnée, animée par l’envie de vous offrir une expérience inoubliable. De l’accueil chaleureux au service attentionné, chaque détail est pensé pour créer une atmosphère où la convivialité et le raffinement se rencontrent. Votre satisfaction est notre plus grande fierté.
                        <br><br>
                        Bienvenue dans un lieu où les arômes se mêlent aux émotions, pour offrir une expérience culinaire unique,
                        dédiée au plaisir des sens et à l’art de recevoir.
                    </h3>
                 </div>
            </div>
        </div>
    </section>

    <!-- Cinquième Page AVIS -->
    <div class="top-page-5">
        <div class="content-top5">
            <h2>NOS AVIS</h2>

        </div>
    </div>

    <section class="container">
        <div class="testimonial mySwiper">
          <div class="testi-content swiper-wrapper">
             <!-- Premier avis -->
            <div class="slide swiper-slide">
              <img src="../public/assets/images/avis-pierre.png" alt="" class="image" />
              <p>
                Une expérience gastronomique incroyable ! Chaque plat était une œuvre d'art,
                avec des saveurs parfaitement équilibrées. L'accueil chaleureux et le cadre élégant m'ont complètement séduit.
                Une adresse à ne pas manquer à Bordeaux !
              </p>
              <i class="bx bxs-quote-alt-left quote-icon"></i>
              <div class="details">
                <span class="name">Frank Dupont</span>
                <span class="job">Avocat</span>
              </div>
            </div>
            <!-- Deuxième avis -->
            <div class="slide swiper-slide">
              <img src="../public/assets/images/avis-gab.jpg" alt="" class="image" />
              <p>
                Le mariage des saveurs et la créativité des chefs m'ont émerveillée.
                Une mention spéciale pour la carte des vins, qui accompagne chaque plat avec finesse.
                Je recommande vivement pour un moment inoubliable en couple ou entre amis.
              </p>
              <i class="bx bxs-quote-alt-left quote-icon"></i>
              <div class="details">
                <span class="name">Gabriel Saint-Louis</span>
                <span class="job">Joueur Pro fortnite</span>
              </div>
            </div>
            <!-- Troisième avis -->
            <div class="slide swiper-slide">
              <img src="../public/assets/images/avis-jean.png" alt="" class="image" />
              <p>
                Le service était irréprochable, et la cuisine exceptionnelle. 
                Chaque bouchée était un délice. On sent l'amour du métier dans chaque détail. 
                Merci à toute l'équipe pour cette soirée magique !
              </p>
              <i class="bx bxs-quote-alt-left quote-icon"></i>
              <div class="details">
                <span class="name">Pierre Martin</span>
                <span class="job">Entrepreneur</span>
              </div>
            </div>
          </div>
          <div class="swiper-button-next nav-btn"></div>
          <div class="swiper-button-prev nav-btn"></div>
          <div class="swiper-pagination"></div>
        </div>
      </section>

      <!-- JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="assets/js/script.js"></script>

      <?php include '../src/views/partials/footer.php'; ?>
</body>
</html>

