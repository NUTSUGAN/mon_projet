<?php
namespace Models;

class Autoloader {
    public static function register() {
        spl_autoload_register([self::class, 'autoload']);
    }

    public static function autoload($class) {
        // Définir la racine du projet
        define('ROOT', dirname(__DIR__, 2));

        // Transformer le namespace en chemin de fichier
        $class = str_replace('\\', '/', $class);
        $file = ROOT . '/src/' . $class . '.php';

        if (file_exists($file)) {
            require_once $file;
        } else {
            die("Erreur : Impossible de charger la classe $class (fichier non trouvé : $file)");
        }
    }
}
