<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/services/AdminService.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/repositories/AdminRepository.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/User.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/Cliente.php';

class AdminController {

    private $adminService = NULL;

    public function __construct() {
        $this->adminService = new AdminService();
    }

    public function index() {
        header('Location: view/UserView.php');
    }

    public function inserirUser(User $user) {

        $this->adminService->createUser($user);
    }

    public function addClient(Cliente $cliente) {
        $this->adminService->insertClient($cliente);
    }

    public function listarAdmin() {
        return $this->adminService->listAdmin();
    }

    public function apagarUser($id) {
        $this->adminService->deletarUser($id);
    }

    public function showCliente() {
        return $this->adminService->listCliente();
    }

    public function entrar($email, $password) {
        $user = $this->adminService->loginUser($email, $password);
        if ($user) {
            $tipo = $user->getTipo();
            session_start();
            $_SESSION['tipo'] = $tipo;
            switch ($tipo) {
                case 'admin':
                    header('Location: ../view/AdminView.php');
                    exit;
                case 'gestor':
                    header('Location: ../view/GestorView.php');
                    exit;
                case 'cliente':
                    header('Location: ../view/UserView.php');
                    exit;
                default:
                    echo '<span style="color: red; display: block; text-align: center;">Tipo de usuário inválido</span>';
                    break;
            }
        } else {
            echo '<span style="color: red; display: block; text-align: center;">Email ou Senha Incorreta</span>';
        }
    }

}

$adminRepository = new AdminRepository();
$admService = new AdminService($adminRepository);
$adminController = new AdminController($admService);
