<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/dbConfig/Db.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/repositories/IAdminRepository.php';

class AdminRepository implements IAdminRepository {

    public function registrarUser(User $user) {
        try {
            $query = 'INSERT INTO users (tipo, nome, email, comuna, municipio, provincia, morada, contacto, username, password) VALUES (:tipo, :nome, :email, :comuna, :municipio, :provincia, :morada, :contacto, :username, :password)';
            $stmt = Db::getConn()->prepare($query);
            $stmt->bindParam(":tipo", $user->getTipo());
            $stmt->bindParam(":nome", $user->getNome());
            $stmt->bindParam(":email", $user->getEmail());
            $stmt->bindParam(":comuna", $user->getComuna());
            $stmt->bindParam(":municipio", $user->getMunicipio());
            $stmt->bindParam(":provincia", $user->getProvincia());
            $stmt->bindParam(":morada", $user->getMorada());
            $stmt->bindParam(":contacto", $user->getContacto());
            $stmt->bindParam(":username", $user->getUsername());
            $stmt->bindParam(":password", $user->getPassword());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function login($email, $password) {
        $query = 'SELECT * FROM users WHERE email = :email AND password = :password';
        $stmt = Db::getConn()->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $userObj = new User();
            $userObj->setId($user['id']);
            $userObj->setTipo($user['tipo']);
            $userObj->setEmail($user['email']);
            $userObj->setPassword($user['password']);

            return $userObj;
        }

        return null;
    }

    public function listarAdmin() {
        $query = "SELECT * FROM users WHERE tipo = 'admin'";
        $stmt = Db::getConn()->prepare($query);
        $stmt->execute();

        $allUsers = array();

        while ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {

            $user = new User();
            $user->setId($resultado["id"]);
            $user->setEmail($resultado["email"]);
            $user->setComuna($resultado["comuna"]);
            $user->setMunicipio($resultado["municipio"]);
            $user->setProvincia($resultado["provincia"]);
            $user->setMorada($resultado["morada"]);
            $user->setContacto($resultado["contacto"]);
            $user->setUsername($resultado["username"]);

            $allUsers[] = $user;
        }

        return $allUsers;
    }

    public function deleteUser($id) {
        $query = 'DELETE FROM users WHERE id = :id';
        $stmt = Db::getConn()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getUserByEmailOrUsername($email, $username) {
        $query = "SELECT * FROM users WHERE email = :email OR username = :username";
        $stmt = Db::getConn()->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function inserirCliente(Cliente $cliente) {
        $query = "SELECT MAX(id) AS ultimo_id FROM users WHERE tipo = 'cliente'";
        $stmt = Db::getConn()->prepare($query);
        $stmt->execute();

        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
        $ultimoId = $resultado['ultimo_id'];

        $query_cliente = 'INSERT INTO clientes(user_id, nacionalidade, tipoCliente, atividadeEmpresa) VALUES (:user_id, :nacionalidade, :tipoCliente, :atividadeEmpresa)';
        $stmt_cliente = Db::getConn()->prepare($query_cliente);
        $stmt_cliente->bindParam(':user_id', $ultimoId);
        $stmt_cliente->bindParam(':nacionalidade', $cliente->getNacionalidade());
        $stmt_cliente->bindParam(':tipoCliente', $cliente->getTipoCliente());
        $stmt_cliente->bindParam(':atividadeEmpresa', $cliente->getAtividadeEmpresa());
        $stmt_cliente->execute();
    }
}
