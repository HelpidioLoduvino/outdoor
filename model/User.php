<?php

class User {

    private $id;
    private $tipo;
    private $nome;
    private $email;
    private $comuna;
    private $municipio;
    private $provincia;
    private $morada;
    private $contacto;
    private $username;
    private $password;

    public function getId() {
        return $this->id;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getComuna() {
        return $this->comuna;
    }

    public function getMunicipio() {
        return $this->municipio;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function getMorada() {
        return $this->morada;
    }

    public function getContacto() {
        return $this->contacto;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getConfirmPassword() {
        return $this->confirmPassword;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setComuna($comuna): void {
        $this->comuna = $comuna;
    }

    public function setMunicipio($municipio): void {
        $this->municipio = $municipio;
    }

    public function setProvincia($provincia): void {
        $this->provincia = $provincia;
    }

    public function setMorada($morada): void {
        $this->morada = $morada;
    }

    public function setContacto($contacto): void {
        $this->contacto = $contacto;
    }

    public function setUsername($username): void {
        $this->username = $username;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

}
