<?php
namespace Models;

use PDO;
use PDOException;

class Room {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function createRoom($name, $description, $capacity, $price, $imagePath) {
        try {
            $query = $this->db->prepare("
                INSERT INTO rooms (name, description, capacity, price, image_path) 
                VALUES (:name, :description, :capacity, :price, :image_path)
            ");
            $query->bindParam(':name', $name);
            $query->bindParam(':description', $description);
            $query->bindParam(':capacity', $capacity, PDO::PARAM_INT);
            $query->bindParam(':price', $price, PDO::PARAM_STR);
            $query->bindParam(':image_path', $imagePath);

            if ($query->execute()) {
                return true;
            } else {
                error_log(" Erreur SQL lors de l'insertion de la chambre : " . implode(" ", $query->errorInfo()));
                return false;
            }
        } catch (PDOException $e) {
            error_log(" Exception SQL : " . $e->getMessage());
            return false;
        }
    }


    public function getAvailableRooms($startDate, $endDate) {
        try {
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
        } catch (PDOException $e) {
            error_log(" Erreur SQL lors de la récupération des chambres disponibles : " . $e->getMessage());
            return [];
        }
    }
}
?>
