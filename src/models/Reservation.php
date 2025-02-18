<?php

namespace Models;

use PDO;

class Reservation {
    private PDO $conn;
    private string $table = 'reservations';

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function createReservation(int $userId, int $roomId, string $startDate, string $endDate): bool {
        $query = "INSERT INTO {$this->table} (user_id, room_id, start_date, end_date) 
                  VALUES (:user_id, :room_id, :start_date, :end_date)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':room_id', $roomId, PDO::PARAM_INT);
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':end_date', $endDate);
        return $stmt->execute();
    }

    public function getUserReservations(int $userId): array {
        $query = "SELECT r.id, r.start_date, r.end_date, rm.name AS room_name
                  FROM {$this->table} r
                  JOIN rooms rm ON r.room_id = rm.id
                  WHERE r.user_id = :user_id
                  ORDER BY r.start_date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllReservations(): array {
        $query = "SELECT r.id, r.start_date, r.end_date, u.username AS user_name, rm.name AS room_name
                  FROM {$this->table} r
                  JOIN users u ON r.user_id = u.id
                  JOIN rooms rm ON r.room_id = rm.id
                  ORDER BY r.start_date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateReservation(int $reservationId, string $startDate, string $endDate): bool {
        $query = "UPDATE {$this->table} 
                  SET start_date = :start_date, end_date = :end_date 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':end_date', $endDate);
        $stmt->bindParam(':id', $reservationId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteReservation(int $reservationId): bool {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $reservationId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getAvailableRooms(string $startDate, string $endDate): array {
        $query = "SELECT rm.id, rm.name, rm.capacity, rm.price, rm.image_path
                  FROM rooms rm
                  WHERE rm.id NOT IN (
                      SELECT room_id FROM {$this->table} 
                      WHERE (:start_date BETWEEN start_date AND end_date) 
                      OR (:end_date BETWEEN start_date AND end_date)
                  )";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':end_date', $endDate);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
