<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/services/IAdminService.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/repositories/AdminRepository.php';

class AdminService implements IAdminService {

    private $adminRepository = NULL;

    public function __construct() {
        $this->adminRepository = new AdminRepository();
    }

    public function createUser(User $user) {
        try {

            $existingUser = $this->adminRepository->getUserByEmailOrUsername($user->getEmail(), $user->getUsername());
            if ($existingUser) {
                return false;
            }

            return $this->adminRepository->registrarUser($user);
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
            return false;
        }
    }

    public function listAdmin() {
        try {
            return $this->adminRepository->listarAdmin();
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
        }
    }

    public function deletarUser($id) {
        try {
            $this->adminRepository->deleteUser($id);
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
        }
    }

    public function loginUser($email, $password) {
        try {
            return $this->adminRepository->login($email, $password);
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
        }
    }

    public function insertClient(Cliente $cliente) {
        try {
            return $this->adminRepository->inserirCliente($cliente);
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
            return false;
        }
    }

    public function listCliente() {
        try {
            return $this->adminRepository->listarCliente();
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
        }
    }

    public function buscarUserId($id) {
        try {
            return $this->adminRepository->getUserById($id);
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
        }
    }

    public function editarUser(User $user) {
        try {
            $this->adminRepository->updateUser($user);
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
        }
    }

}
