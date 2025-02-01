<?php
class RoomController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // 1. Création d'une chambre (Admin uniquement)
    public function createRoom($name, $description, $capacity, $price, $imagePath) {
        $query = $this->db->prepare("INSERT INTO rooms (name, description, capacity, price, image_path) VALUES (:name, :description, :capacity, :price, :image_path)");
        $query->bindParam(':name', $name);
        $query->bindParam(':description', $description);
        $query->bindParam(':capacity', $capacity, PDO::PARAM_INT);
        $query->bindParam(':price', $price);
        $query->bindParam(':image_path', $imagePath); // Stocke les noms des fichiers d'images, par ex. JSON
        return $query->execute();
    }

    // 2. Récupération des chambres disponibles (Utilisateurs)
    public function getAvailableRooms($startDate, $endDate) {
        $query = $this->db->prepare("
            SELECT * FROM rooms 
            WHERE id NOT IN (
                SELECT room_id FROM reservations 
                WHERE (start_date <= :endDate AND end_date >= :startDate)
            )
        ");
        $query->bindParam(':startDate', $startDate);
        $query->bindParam(':endDate', $endDate);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // 3. Modifier une chambre (Admin uniquement)
    public function updateRoom($id, $name, $description, $capacity, $price, $imagePath) {
        $query = $this->db->prepare("UPDATE rooms SET name = :name, description = :description, capacity = :capacity, price = :price, images = :images WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':name', $name);
        $query->bindParam(':description', $description);
        $query->bindParam(':capacity', $capacity, PDO::PARAM_INT);
        $query->bindParam(':price', $price);
        $query->bindParam(':image_path', $imagePath);
        return $query->execute();
    }

    // 4. Supprimer une chambre (Admin uniquement)
    public function deleteRoom($id) {
        $query = $this->db->prepare("DELETE FROM rooms WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return $query->execute();
    }

    public function listRooms() {
        $query = "SELECT * FROM rooms";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
