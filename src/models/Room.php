<?php
class Room {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createRoom($name, $description, $capacity, $price, $imagePath) {
        $query = $this->db->prepare("INSERT INTO rooms (name, description, capacity, price, image_path) VALUES (:name, :description, :capacity, :price, :image_path)");
        $query->bindParam(':name', $name);
        $query->bindParam(':description', $description);
        $query->bindParam(':capacity', $capacity, PDO::PARAM_INT);
        $query->bindParam(':price', $price);
        $query->bindParam(':image_path', $imagePath);
        $query->execute();
    }

    public function getAllRooms() {
        $query = $this->db->query("SELECT * FROM rooms ORDER BY created_at DESC");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAvailableRooms($startDate, $endDate) {
        $query = $this->db->prepare("
            SELECT * FROM rooms WHERE id NOT IN (
                SELECT room_id FROM reservations 
                WHERE :start_date < end_date AND :end_date > start_date
            )
        ");
        $query->bindParam(':start_date', $startDate);
        $query->bindParam(':end_date', $endDate);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
