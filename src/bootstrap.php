<?php

// Charger Composer Autoloader
require_once ROOT . '/vendor/autoload.php';

// Charger les variables d'environnement depuis .env
if (file_exists(ROOT . '/.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(ROOT);
    $dotenv->load();
}

// Enregistrer l'autoloader personnalisé
require_once ROOT . '/src/utils/Autoloader.php';
Models\Autoloader::register();
