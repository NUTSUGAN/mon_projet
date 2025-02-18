<?php

namespace Config;

use PDO;
use PDOException;
use Dotenv\Dotenv;
use Exception;

class Database {
    private static ?PDO $conn = null; // Singleton : Une seule instance de connexion

    private function __construct() {
        // Empêche l'instanciation externe
    }

    public static function getConnection(): PDO {

        if (self::$conn === null) {
            try {
                // Charger les variables d'environnement si ce n'est pas déjà fait
                if (!isset($_ENV['DB_HOST'])) {
                    $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2)); // Aller à la racine du projet
                    $dotenv->load();                    
                }

                // Récupérer les variables d'environnement
                $host = $_ENV['DB_HOST'] ?? 'localhost';
                $dbname = $_ENV['DB_NAME'] ?? 'hotel_system';
                $username = $_ENV['DB_USER'] ?? 'root';
                $password = $_ENV['DB_PASS'] ?? '';

                // Connexion PDO
                self::$conn = new PDO(
                    "mysql:host={$host};dbname={$dbname};charset=utf8mb4",
                    $username,
                    $password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Active les exceptions PDO
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Mode de récupération par défaut
                        PDO::ATTR_PERSISTENT => true // Connexion persistante
                    ]
                );
                
            } catch (PDOException $e) {
                throw new Exception(self::class . " : Erreur de connexion à la base de données - " . $e->getMessage());
            }

        }
        return self::$conn;
    }

    public static function closeConnection(): void {
        self::$conn = null;
    }
}
?>

