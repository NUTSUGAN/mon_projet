<?php 

// controllers/ReservationController.php

class ReservationController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function reserveRoom() {
        require_once '../models/Room.php';
        require_once '../models/Reservation.php';

        $roomModel = new Room($this->db);
        $reservationModel = new Reservation($this->db);

        $availableRooms = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];

            $availableRooms = $roomModel->getAvailableRooms($startDate, $endDate);
        }

        if (isset($_POST['reserve'])) {
            session_start();
            $roomId = $_POST['room_id'];
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];

            $reservationModel->createReservation($_SESSION['user']['id'], $roomId, $startDate, $endDate);

            header('Location: /user/dashboard.php'); // Redirige vers le tableau de bord
            exit;
        }

        include '../views/user/reserve.php'; // Affiche la vue de réservation
    }
}
