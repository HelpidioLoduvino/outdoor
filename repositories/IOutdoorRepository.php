<?php

include_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/Outdoor.php';
include_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/AlugarOutdoor.php';
interface IOutdoorRepository {
    public function inserirOutdoor(Outdoor $outdoor);
    public function listarOutdoor();
    public function apagarOutdoor($id);
    public function alugarOutdoor(AlugarOutdoor $alugarOutdoor, $clienteId);
    public function listarOutdoorAlugado();
    public function atualizarEstadoOutdoor($outdoorId, $estado);
    public function apagarOutdoorAlugado($id);
    public function AnalisarOutdoor();
    public function insertAnalisarOutdoor($outdoorId, $clienteId, $dataInicio, $dataFim);
}
