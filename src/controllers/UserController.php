<?php

require_once '../../models/User.php';

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    // Récupérer tous les utilisateurs
    public function listUsers() {
        return $this->userModel->getAllUsers();
    }

    // Ajouter un utilisateur
    public function addUser($data) {
        $this->userModel->username = $data['username'];
        $this->userModel->email = $data['email'];
        $this->userModel->password = $data['password'];
        $this->userModel->address = $data['address'];
        $this->userModel->phone = $data['phone'];
        return $this->userModel->register();
    }

    // Mettre à jour un utilisateur
    public function editUser($data) {
        $this->userModel->id = $data['id'];
        $this->userModel->username = $data['username'];
        $this->userModel->email = $data['email'];
        $this->userModel->address = $data['address'];
        $this->userModel->phone = $data['phone'];
        return $this->userModel->updateUser();
    }

    // Supprimer un utilisateur
    public function deleteUser($id) {
        return $this->userModel->deleteUser($id);
    }

    
}
?>
