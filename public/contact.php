<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/mon_projet/public/assets/css/contact.css">    
    <title>Contact </title>
</head>
<body>

<?php include '../src/views/partials/header.php'; ?>

    <header>
    <!-- Partie top section avec image  -->
    <div class="top-section">
        <div class="content">
            <h1>Nous contacter</h1>
            <p>Nous sommes là pour répondre à toutes vos questions. N'hésitez pas à nous écrire !</p>
        </div>
    </div>
    </header>
   

    <div class="container">
           
        <!-- Form Section -->
        <div class="form-section">
            <h3>Contactez-nous</h3>
            <form id="contactForm" >
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


    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>


    <script>
    (function(){
        emailjs.init("lQ3Kyd5ciUs8Oe6Ht"); // Remplace par ton USER_ID
    })();
    </script>

    <script src="assets/js/email.js"></script>

    <?php include '../src/views/partials/footer.php'; ?>

    
</body>
</html>