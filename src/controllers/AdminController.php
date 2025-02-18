<?php

namespace Controllers;

use Models\Room;
use Config\Database;


class AdminController {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function createRoom() {
        $roomModel = new Room($this->db);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $name = trim($_POST['name']);
            $description = trim($_POST['description']);
            $capacity = (int) $_POST['capacity'];
            $price = (float) $_POST['price'];
            $imagePath = trim($_POST['image_path']); // L'URL est entrée manuellement

            // Vérifier que tous les champs sont bien remplis
            if (!empty($name) && !empty($description) && $capacity > 0 && $price > 0 && !empty($imagePath)) {
                if ($roomModel->createRoom($name, $description, $capacity, $price, $imagePath)) {
                    header('Location: /hotel_projet/admin/rooms.php?success=1');
                    exit;
                } else {
                    $errorMsg = "Erreur lors de la création de la chambre.";
                }
            } else {
                $errorMsg = "Tous les champs sont obligatoires.";
            }
        }
    }

    public function listRooms() {
        $roomModel = new Room($this->db);
        return $roomModel->getAllRooms(); // Retourne toutes les chambres
    }
}
?>
