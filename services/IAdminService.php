<?php
include_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/User.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/Cliente.php';
interface IAdminService {
    public function createUser(User $user);
    public function listAdmin();
    public function deletarUser($id);
    public function loginUser($email, $password);
    public function insertClient(Cliente $cliente);
    public function listCliente();
}
