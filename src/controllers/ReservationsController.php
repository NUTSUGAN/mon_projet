<?php

namespace Controllers;

use Models\Room;
use Models\Reservation;
use Config\Database;

class ReservationsController {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function reserveRoom() {
        session_start();

        // Vérifier que l'utilisateur est connecté
        if (!isset($_SESSION['user']['id'])) {
            header('Location: /user/login.php'); // Redirige vers la page de connexion
            exit;
        }

        $roomModel = new Room($this->db);
        $reservationModel = new Reservation($this->db);
        $availableRooms = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $startDate = trim($_POST['start_date']);
            $endDate = trim($_POST['end_date']);

            // Vérifier que les dates sont bien fournies
            if (!empty($startDate) && !empty($endDate)) {
                $availableRooms = $roomModel->getAvailableRooms($startDate, $endDate);
            } else {
                $errorMsg = "Veuillez sélectionner des dates valides.";
            }
        }

        if (isset($_POST['reserve'])) {
            $roomId = $_POST['room_id'];
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];
            $userId = $_SESSION['user']['id'];

            // Vérifier que les champs sont bien remplis avant d'ajouter la réservation
            if (!empty($roomId) && !empty($startDate) && !empty($endDate)) {
                $reservationModel->createReservation($userId, $roomId, $startDate, $endDate);
                header('Location: /user/dashboard.php'); // Redirige vers le tableau de bord
                exit;
            } else {
                $errorMsg = "Tous les champs sont obligatoires.";
            }
        }

        include __DIR__ . '/../Views/user/reserve.php'; // Affiche la vue de réservation
    }
}
?>
