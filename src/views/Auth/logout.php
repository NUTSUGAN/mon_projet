<?php
session_start();  // Démarre la session
session_unset();  // Supprime toutes les variables de session
session_destroy();  // Détruit la session

// Redirige vers la page d'accueil après la déconnexion
header('Location: ../../../public/index.php');
exit();
