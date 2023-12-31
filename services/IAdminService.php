<?php
include_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/User.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/Cliente.php';
interface IAdminService {
    public function createUser(User $user);
    public function listAdmin();
    public function deletarUser($id);
    public function deletarCliente($id);
    public function loginUser($email, $password);
    public function insertClient(Cliente $cliente);
    public function listCliente();
    public function buscarUserId($id);
    public function editarUser(User $user);
    public function buscarClienteId($id);
    public function updateEstadoCliente($userId, $estado);
    public function buscarEstadoCliente($userId);
}
