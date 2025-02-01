<?php
class Reservation {
    private $conn;
    private $table = 'reservations';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createReservation($userId, $roomId, $startDate, $endDate) {
        $query = "INSERT INTO " . $this->table . " (user_id, room_id, start_date, end_date) 
                  VALUES (:user_id, :room_id, :start_date, :end_date)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':room_id', $roomId);
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':end_date', $endDate);
        return $stmt->execute();
    }

    public function getUserReservations($userId) {
        $query = "SELECT r.id, r.start_date, r.end_date, rm.name AS room_name
                  FROM " . $this->table . " r
                  JOIN rooms rm ON r.room_id = rm.id
                  WHERE r.user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllReservations() {
        $query = "SELECT r.id, r.start_date, r.end_date, u.username AS user_name, rm.name AS room_name
                  FROM " . $this->table . " r
                  JOIN users u ON r.user_id = u.id
                  JOIN rooms rm ON r.room_id = rm.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function updateReservation($reservationId, $startDate, $endDate) {
        $query = "UPDATE " . $this->table . " 
                  SET start_date = :start_date, end_date = :end_date 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':end_date', $endDate);
        $stmt->bindParam(':id', $reservationId);
        return $stmt->execute();
    }
    
    public function deleteReservation($reservationId) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $reservationId);
        return $stmt->execute();
    }
}
