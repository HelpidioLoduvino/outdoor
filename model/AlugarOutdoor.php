<?php

class AlugarOutdoor extends Outdoor {
    private $outdoor_id;
    private $dataInicio;
    private $dataFim;
    
    public function getOutdoor_id() {
        return $this->outdoor_id;
    }

    public function getDataInicio() {
        return $this->dataInicio;
    }

    public function getDataFim() {
        return $this->dataFim;
    }

    public function setOutdoor_id($outdoor_id): void {
        $this->outdoor_id = $outdoor_id;
    }

    public function setDataInicio($dataInicio): void {
        $this->dataInicio = $dataInicio;
    }

    public function setDataFim($dataFim): void {
        $this->dataFim = $dataFim;
    }


}
