<?php
include_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/User.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/Cliente.php';
interface IAdminRepository {
    public function registrarUser(User $user);
    public function listarAdmin();
    public function deleteUser($id);
    public function login($email, $password);
    public function inserirCliente(Cliente $cliente);
    public function listarCliente();
    public function getUserById($id);
    public function updateUser(User $user);
    public function getClienteById($id);
    public function atualizarEstadoCliente($userId, $estado);
    public function getEstadoCliente($userId);
}
