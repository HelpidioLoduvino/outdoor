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

    public function solicitarOutdoor(AlugarOutdoor $alugarOutdoor, $clienteId) {
        try {
            return $this->outdoorRepository->alugarOutdoor($alugarOutdoor, $clienteId);
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
            return false;
        }
    }

    public function listOutdoorAlugado() {
        try {
            return $this->outdoorRepository->listarOutdoorAlugado();
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
        }
    }

    public function updateOutdoorState($outdoorId, $estado) {
        try {
            return $this->outdoorRepository->atualizarEstadoOutdoor($outdoorId, $estado);
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
        }
    }

    public function deletarOutdoorAlugado($id) {
        try {
            $this->outdoorRepository->apagarOutdoorAlugado($id);
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
        }
    }

    public function analisarComprovativo() {
        try {
            return $this->outdoorRepository->AnalisarOutdoor();
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
        }
    }

    public function inserirAnalisarOutdoor($outdoorId, $clienteId, $dataInicio, $dataFim) {
        try {
            return $this->outdoorRepository->insertAnalisarOutdoor($outdoorId, $clienteId, $dataInicio, $dataFim);
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
            return false;
        }
    }

    public function deletarAnalisarAluguer($id) {
        try {
            $this->outdoorRepository->apagarAnalisarAluguer($id);
        } catch (Exception $ex) {
            echo "An error occurred while: " . $ex->getMessage();
        }
    }

}
