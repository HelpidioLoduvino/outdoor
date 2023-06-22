<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/services/IOutdoorService.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/repositories/OutdoorRepository.php';

class OutdoorService implements IOutdoorService {

    private $outdoorRepository = NULL;

    public function __construct() {
        $this->outdoorRepository = new OutdoorRepository();
    }

    public function insertOutdoor(Outdoor $outdoor) {
        try {
            return $this->outdoorRepository->inserirOutdoor($outdoor);
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
            return false;
        }
    }

    public function listOutdoor() {
        try {
            return $this->outdoorRepository->listarOutdoor();
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
        }
    }

    public function deletarOutdoor($id) {
        try {
            $this->outdoorRepository->apagarOutdoor($id);
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
        }
    }

}