<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/services/OutdoorService.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/repositories/OutdoorRepository.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/Outdoor.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/AlugarOutdoor.php';

class OutdoorController {
    private $outdoorService = NULL;

    public function __construct() {
        $this->outdoorService = new OutdoorService();
    }
    
    public function addOutdoor(Outdoor $outdoor){
        $this->outdoorService->insertOutdoor($outdoor);
    }
    
    public function showOutdoor(){
        return $this->outdoorService->listOutdoor();
    }
    
    public function apagarOutdoor($id){
        $this->outdoorService->deletarOutdoor($id);
    }
    
    public function aluguerOutdoor(AlugarOutdoor $alugarOutdoor, $clienteId){
        $this->outdoorService->solicitarOutdoor($alugarOutdoor, $clienteId);
    }
    
    public function showOutdoorAlugado(){
        return $this->outdoorService->listOutdoorAlugado();
    }
    
    public function updateOutdoorEstado($outdoorId, $estado){
        $this->outdoorService->updateOutdoorState($outdoorId, $estado);
    }
    
    public function deleteOutdoorAlugado($id){
        $this->outdoorService->deletarOutdoorAlugado($id);
    }
}

$outdoorRepository = new OutdoorRepository();
$outService = new OutdoorService($outdoorRepository);
$outdoorController = new OutdoorController($outService);