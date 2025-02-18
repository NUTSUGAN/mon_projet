<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Raleway:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/mon_projet/public/assets/css/chambre.css">    
    <title>Carte des vins</title>
</head>
<body>

<?php include '../src/views/partials/header.php'; ?>

    <header>
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
    
    <?php include '../src/views/partials/footer.php'; ?>


</body>
</html>