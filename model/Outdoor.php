<?php

class Outdoor {

    private $id;
    private $tipoOutdoor;
    private $preco;
    private $provincia;
    private $municipio;
    private $comuna;
    private $estado;
    private $imagem;

    public function getId() {
        return $this->id;
    }

    public function getTipoOutdoor() {
        return $this->tipoOutdoor;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function getMunicipio() {
        return $this->municipio;
    }

    public function getComuna() {
        return $this->comuna;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setTipoOutdoor($tipoOutdoor): void {
        $this->tipoOutdoor = $tipoOutdoor;
    }

    public function setPreco($preco): void {
        $this->preco = $preco;
    }

    public function setProvincia($provincia): void {
        $this->provincia = $provincia;
    }

    public function setMunicipio($municipio): void {
        $this->municipio = $municipio;
    }

    public function setComuna($comuna): void {
        $this->comuna = $comuna;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }

    public function setImagem($conteudo): void {
        $this->imagem = $conteudo;
    }



}
