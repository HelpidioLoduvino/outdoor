<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/services/ILocalidadeService.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/repositories/LocalidadeRepository.php';

class LocalidadeService implements ILocalidadeService{
    
    private $localidadeRepository = NULL;

    public function __construct() {
        $this->localidadeRepository = new LocalidadeRepository();
    }
    
    public function buscarProvincia() {
        try{
            return $this->localidadeRepository->getProvincia();
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
        }
    }

}
