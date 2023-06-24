<?php
include_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/Outdoor.php';
include_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/AlugarOutdoor.php';

interface IOutdoorService {
    public function insertOutdoor(Outdoor $outdoor);
    public function listOutdoor();
    public function deletarOutdoor($id);
    public function solicitarOutdoor(AlugarOutdoor $alugarOutdoor);
    public function listOutdoorAlugado();
    public function updateOutdoorState($outdoorId, $estado);
    public function deletarOutdoorAlugado($id);
  
}
