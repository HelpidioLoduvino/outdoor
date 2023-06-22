<?php


class Provincia {
    private $nome;
    private $id;
    
    public function getNome() {
        return $this->nome;
    }

    public function getId() {
        return $this->id;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setId($id): void {
        $this->id = $id;
    }


}
