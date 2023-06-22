<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/services/OutdoorService.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/repositories/OutdoorRepository.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/Outdoor.php';

class OutdoorController {
    private $outdoorService = NULL;

    public function __construct() {
        $this->outdoorService = new OutdoorService();
    }
    
    public function addOutdoor(Outdoor $outdoor){
        $this->outdoorService->insertOutdoor($outdoor);
    }
    
    public function listarOutdoor(){
        return $this->outdoorService->listOutdoor();
    }
    
    public function apagarOutdoor($id){
        $this->outdoorService->deletarOutdoor($id);
    }
}

$outdoorRepository = new OutdoorRepository();
$outService = new OutdoorService($outdoorRepository);
$outdoorController = new OutdoorController($outService);