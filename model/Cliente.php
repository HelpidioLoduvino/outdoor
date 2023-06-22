<?php


class Cliente extends User {
    private $user_id;
    private $nacionalidade;
    private $tipoCliente;
    private $atividadeEmpresa;
    
    public function getNacionalidade() {
        return $this->nacionalidade;
    }

    public function getTipoCliente() {
        return $this->tipoCliente;
    }

    public function getAtividadeEmpresa() {
        return $this->atividadeEmpresa;
    }

    public function setNacionalidade($nacionalidade): void {
        $this->nacionalidade = $nacionalidade;
    }

    public function setTipoCliente($tipoCliente): void {
        $this->tipoCliente = $tipoCliente;
    }

    public function setAtividadeEmpresa($atividadeEmpresa): void {
        $this->atividadeEmpresa = $atividadeEmpresa;
    }
    public function getUser_id() {
        return $this->user_id;
    }

    public function setUser_id($user_id): void {
        $this->user_id = $user_id;
    }
}
