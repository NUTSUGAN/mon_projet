<style>
    

footer {
    background-color: #1c1c1a;
    color: #fff;
    text-align: center;
    padding: 20px 0;
    font-size: 0.9em;
}

.footer-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.footer-content h2 {
    margin-bottom: 10px;
    color: #fff;
}

.footer-content a {
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    display: inline-block;
    margin-bottom: 20px;
    border: 1px solid #fff;
   
}

.footer-content .info {
    margin: 20px 0;
}
.footer-content .info h4 {
    color: #946e55 ;
}

.footer-content .logos {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-bottom: 20px;
}

.footer-content .socials {
    display: flex;
    gap: 0;
    margin-right: 130px;
}

.footer-content .socials a {
    width: 30px;
    height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid #fff;

}

.separator {
    width: 50%;
    height: 3px;
    background-color:rgb(187, 107, 54);
    margin: 30px 0; 
}

.divs-container {
    width: 100%;
    display: flex; 
    justify-content: space-between;
    align-items: center;
   
 
}

.divs-container .socials a {

    width:-45px;
    height:auto;
}

/* Responsive adjustments */
@media (max-width: 1024px) {
    /* For tablets */
    .top-section {
        height: 70vh; /* Ajuste la hauteur de la section top pour les tablettes */
    }

    .content h1 {
        font-size: 2.5rem; /* Réduit la taille du titre sur tablette */
    }

    .content p {
        font-size: 1.2rem; /* Réduit la taille du sous-titre sur tablette */
    }

    .services-section {
        margin: 30px 20px;
    }

    .commodities div {
        flex: 1 1 calc(50% - 20px);
    }
}

@media (max-width: 768px) {
    /* For small tablets and mobile */
    .top-section {
        height: 60vh;
    }

    .content h1 {
        font-size: 2rem;
    }

    .content p {
        font-size: 1.1rem;
    }

    .services-section {
        margin: 20px;
        padding: 20px 10px;
    }

    .commodities div {
        flex: 1 1 calc(100% - 40px); /* Commodities prennent 100% sur mobile */
    }

    .slider .service-item {
        flex: 1 1 100%; /* Slider à un seul item par écran */
    }

    .footer-content {
        flex-direction: column;
        padding: 20px;
    }

    .footer-content .socials {
        margin-right: 0;
    }

    .separator {
        width: 70%;
    }
}

@media (max-width: 480px) {
    /* For mobile phones */
    .top-section {
        height: 50vh;
    }

    .content h1 {
        font-size: 1.5rem;
    }

    .content p {
        font-size: 1rem;
    }

    .services-section {
        margin: 10px;
        padding: 10px 5px;
    }

    .image-section img {
        margin: 30px 0;
    }

    .commodities div {
        flex: 1 1 100%; /* Commodities à 100% de largeur */
        margin-bottom: 20px; /* Espacement entre les commodités */
    }

    .footer-content .logos {
        flex-direction: column;
    }
}
</style>

<footer>
        <div class="footer-content">
 
            <h2>Recevez nos dernières offres et actualités</h2>
            <a href="/mon_projet/src/Views/Auth/register.php">INSCRIVEZ-VOUS ></a>
 
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
                    <a href="#"><img src="/mon_projet/public/assets/images/facebook-icon 1.png" alt="Facebook"></a>
                    <a href="#"><img src="/mon_projet/public/assets/images/Instagram-Logo-Transparent-Image.png" alt="Instagram"></a>
                </div>
              
                <div class="logo">
                    <img src="/mon_projet/public/assets/images/LOGO 3.png" alt=" Entrprise">
                   
                </div>
            </div>
        </div>
    </footer>