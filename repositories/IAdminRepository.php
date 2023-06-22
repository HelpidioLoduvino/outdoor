<?php
include_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/User.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/Cliente.php';
interface IAdminRepository {
    public function registrarUser(User $user);
    public function listarAdmin();
    public function deleteUser($id);
    public function login($email, $password);
    public function inserirCliente(Cliente $cliente);
}
