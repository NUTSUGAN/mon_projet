document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Empêche le rechargement de la page

    let formData = {
        nom: document.getElementById("nom").value,
        prenom: document.getElementById("prenom").value,
        entreprise: document.getElementById("entreprise").value || "Non renseignée",
        email: document.getElementById("email").value, 
        reply_to: document.getElementById("email").value, 
        pays: document.getElementById("pays").value,
        sujet: document.getElementById("sujet").value,
        message: document.getElementById("message").value
    };

    emailjs.send("service_nujoko_id01", "template_yjt4ako", formData)
        .then(function(response) {
            console.log("✅ Email envoyé avec succès !", response);
            alert("Votre message a bien été envoyé !");
            document.getElementById("contactForm").reset();
        }, function(error) {
            console.error("❌ Erreur lors de l'envoi :", error);
            alert("Erreur lors de l'envoi. Vérifiez votre configuration EmailJS.");
        });


        emailjs.send("service_nujoko_id01", "template_yjt4ako", formData)
        .then(function(response) {
            console.log("✅ Email envoyé avec succès !", response);
    
            // Envoi du mail de confirmation à l'utilisateur
            emailjs.send("service_nujoko_id01", "template_auto_reply", {
                email: formData.email, 
                nom: formData.nom,
                sujet: formData.sujet,
                message: formData.message
            }).then(function(response) {
                console.log("✅ Auto-Reply envoyé avec succès !");
            }).catch(function(error) {
                console.error("❌ Erreur lors de l'envoi de l'Auto-Reply :", error);
            });
    
            alert("Votre message a bien été envoyé !");
        })
        .catch(function(error) {
            console.error("❌ Erreur EmailJS :", error);
            alert("Erreur : " + error.text);
        });
    
});


