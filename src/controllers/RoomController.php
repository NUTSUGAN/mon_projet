<?php

namespace Controllers;

use Config\Database;
use Exception;
use PDO;

class RoomController {
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();

    }

    // 1. Créer une chambre (Admin uniquement)
    public function createRoom(string $name, string $description, int $capacity, float $price, string $imagePath): bool
    {
        try {
            $query = $this->db->prepare("INSERT INTO rooms (name, description, capacity, price, image_path) VALUES (:name, :description, :capacity, :price, :image_path)");
            $query->bindParam(':name', $name);
            $query->bindParam(':description', $description);
            $query->bindParam(':capacity', $capacity, PDO::PARAM_INT);
            $query->bindParam(':price', $price);
            $query->bindParam(':image_path', $imagePath);
            return $query->execute();
        } catch (Exception $e) {
            error_log("  Erreur lors de la création de la chambre : " . $e->getMessage());
            return false;
        }
    }

    // 2. Récupérer les chambres disponibles
    public function getAvailableRooms(string $startDate, string $endDate): array
    {
        try {
            $query = $this->db->prepare("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM reservations WHERE (start_date <= :endDate AND end_date >= :startDate))");
            $query->bindParam(':startDate', $startDate);
            $query->bindParam(':endDate', $endDate);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Erreur lors de la récupération des chambres disponibles : " . $e->getMessage());
            return [];
        }
    }

    // 3. Modifier une chambre (Admin uniquement)
    public function updateRoom(int $id, string $name, string $description, int $capacity, float $price, string $imagePath): bool
    {
        try {
            $query = $this->db->prepare("UPDATE rooms SET name = :name, description = :description, capacity = :capacity, price = :price, image_path = :image_path WHERE id = :id");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->bindParam(':name', $name);
            $query->bindParam(':description', $description);
            $query->bindParam(':capacity', $capacity, PDO::PARAM_INT);
            $query->bindParam(':price', $price);
            $query->bindParam(':image_path', $imagePath);
            return $query->execute();
        } catch (Exception $e) {
            error_log("Erreur lors de la modification de la chambre : " . $e->getMessage());
            return false;
        }
    }

    // 4. Supprimer une chambre (Admin uniquement)
    public function deleteRoom(int $id): bool
    {
        try {
            $query = $this->db->prepare("DELETE FROM rooms WHERE id = :id");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            return $query->execute();
        } catch (Exception $e) {
            error_log("Erreur lors de la suppression de la chambre : " . $e->getMessage());
            return false;
        }
    }
}
