<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/services/LocalidadeService.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/repositories/LocalidadeRepository.php';

class LocalidadeController {
    private $localidadeService = NULL;

    public function __construct() {
        $this->localidadeService = new LocalidadeService();
    }
    
    public function mostrarProvincia(){
        return $this->localidadeService->buscarProvincia();
    }
    
    public function mostrarNacionalidade(){
        return $this->localidadeService->buscarNacionalidade();
    }
}


$localidadeRepository = new LocalidadeRepository();
$localService = new LocalidadeService($localidadeRepository);
$localidadeController = new LocalidadeController($localService);