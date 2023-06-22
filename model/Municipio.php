<?php

class Municipio {
    private $id;
    private $nome;
    private $provincia_id;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getProvincia_id() {
        return $this->provincia_id;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setProvincia_id($provincia_id): void {
        $this->provincia_id = $provincia_id;
    }


}
