<?php

class Comuna {
    private $id;
    private $nome;
    private $comuna_id;
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getComuna_id() {
        return $this->comuna_id;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setComuna_id($comuna_id): void {
        $this->comuna_id = $comuna_id;
    }


}
