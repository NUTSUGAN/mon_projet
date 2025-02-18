<?php

class AdminController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createRoom() {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/hotel_projet/models/Room.php';
        $roomModel = new Room($this->db);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name']; 
            $description = $_POST['description'];
            $capacity = $_POST['capacity'];
            $price = $_POST['price'];
            $imagePath = '/uploads/' . basename($_FILES['image']['name']);
    
            move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $imagePath);
    
            $roomModel->createRoom($name, $description, $capacity, $price, $imagePath);
    
            $this->db = null; // Fermer la connexion
            header('Location: /hotel_projet/admin/rooms.php');
            exit;
        }
    
        $this->db = null; // Fermer la connexion après utilisation
    }

    public function listRooms() {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/hotel_projet/models/Room.php';
        $roomModel = new Room($this->db);
    
        // Utilisez getAllRooms() pour obtenir la liste des chambres
        $rooms = $roomModel->getAllRooms();
    
        // Renvoie la liste des chambres pour l'utiliser dans l'index
        return $rooms;
    }
    

    
    
}
?>
