<?php


class Cliente extends User {
    private $nacionalidade;
    private $tipoCliente;
    private $atividadeEmpresa;
    private $estado;
    
    public function getNacionalidade() {
        return $this->nacionalidade;
    }

    public function getTipoCliente() {
        return $this->tipoCliente;
    }

    public function getAtividadeEmpresa() {
        return $this->atividadeEmpresa;
    }

    public function getEstado() {
        return $this->estado;
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

    public function setEstado($estado): void {
        $this->estado = $estado;
    }   
}
