<?php

class AlugarOutdoor extends Outdoor {
    private $dataInicio;
    private $dataFim;
    private $clienteId;
    private $clienteNome;
    private $pdf;
    
    public function getDataInicio() {
        return $this->dataInicio;
    }

    public function getDataFim() {
        return $this->dataFim;
    }

    public function getClienteId() {
        return $this->clienteId;
    }

    public function getClienteNome() {
        return $this->clienteNome;
    }

    public function getPdf() {
        return $this->pdf;
    }

    public function setDataInicio($dataInicio): void {
        $this->dataInicio = $dataInicio;
    }

    public function setDataFim($dataFim): void {
        $this->dataFim = $dataFim;
    }

    public function setClienteId($clienteId): void {
        $this->clienteId = $clienteId;
    }

    public function setClienteNome($clienteNome): void {
        $this->clienteNome = $clienteNome;
    }

    public function setPdf($pdf): void {
        $this->pdf = $pdf;
    }
}
