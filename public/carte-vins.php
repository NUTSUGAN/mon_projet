<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Raleway:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/mon_projet/public/assets/css/carte-vins.css">    
    <title>Carte des vins</title>
</head>
<body>

<?php include '../src/views/partials/header.php'; ?>

    <header>
    <!-- Partie top section avec image  -->
        <div class="top-section-vins">
            <div class="content-vins">
                <h1>Les vins</h1>
                <p>Découvrez notre carte de vins !</p>
                <a href="/mon_projet/public/reservation.php" class="btn-vins">Réserver maintenant</a>
                </div>
        </div>
    </header>
    

    <!----------------------- Première Page -------------------->
     <section class="global-vins">
        <div class="top-vins">
            <div class="first-p">
                <h2>Rendre accessible une gastronomie d’élite …</h2>
            </div>
            <div class="second-p">
                <h3>…tel est l’objectif de Stéphane Manigold. Et cela passe également par la carte des vins qui sera ici « de tempérament ».</h3>
            </div>
            <div class="third-p">
                <h3>Élaborée avec Anselme Selosse, créateur originel de la cuvée « Contraste », elle offre de belles surprises, révélant des millésimes anciens, uniques, ceux que les vignerons préfèrent d’ordinaire garder «derrière les fagots».</h3>
            </div>
            <div class="fourth-p">
                <h3>Pour une fois, ce sont ceux-là qui sont mis en avant.</h3>
            </div>
        </div>

        <div class="container-vins">
            <div class="left-container">
                <!-- Premier bloc de text -->
                <div class="first-container-vins">
                    <h2>LE SOMMELIER -</h2>
                </div>
                <!-- Deuxième bloc text -->
                <div class="second-container-vins">
                    <h3>Le sommelier incarne la passion de la sommellerie, mettant son expertise et son talent au service des clients de Contraste. Son parcours, forgé aux côtés de grandes personnalités du monde viticole, lui confère une profonde connaissance du domaine.</h3>
                </div>
                <!-- Troisième bloc text -->
                 <div class="third-container-vins">
                    <h3>Chez Contraste, il privilégie les vins français, valorisant ainsi la richesse de nos terroirs et de nos vignobles. Cette sélection variée permet à chacun de découvrir ou redécouvrir des vignerons de talent. La carte des vins, constamment renouvelée, offre une sélection riche, parfois méconnue, où aucun vin n’est laissé à l’abandon. </h3>
                 </div>
                 <!-- Quatrième bloc text -->
                  <div class="fourth-container-vins">
                    <h3>Le sommelier crée une expérience de dégustation unique, attentive aux envies et préférences de chaque client, avec un service décontracté, professionnel et agréable.</h3>
                  </div>
            </div>

            <!-- Notre image de vins -->
            <div class="right-container">
            </div>
        </div>
     </section>



     <!----------------- Deuxième Page Carte ---------------------->

     <section class="global-carte-vins">
        <div class="top-section3">
            <h1>NOTRE CARTE</h1>
            <div class="undertitle">
                <h3>La Flèche d'Argent : Voici notre carte au cœur d'un cadre raffiné et prestigieux.</h3>

            </div>
        </div>

        <div class="global-section3">
            <div class="left-section3"></div>            
        </div>
     </section>


     <?php include '../src/views/partials/footer.php'; ?>
 
</body>
</html>