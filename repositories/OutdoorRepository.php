<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/dbConfig/Db.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/repositories/IOutdoorRepository.php';

class OutdoorRepository implements IOutdoorRepository {

    public function inserirOutdoor(Outdoor $outdoor) {
        try {
            $query = 'INSERT INTO outdoors (tipoOutdoor, preco, estado, provincia, municipio, comuna, imagem) VALUES (:tipoOutdoor, :preco, :estado, :provincia, :municipio, :comuna, :imagem)';
            $stmt = Db::getConn()->prepare($query);
            $stmt->bindParam(":tipoOutdoor", $outdoor->getTipoOutdoor());
            $stmt->bindParam(":preco", $outdoor->getPreco());
            $stmt->bindParam(":estado", $outdoor->getEstado());
            $stmt->bindParam(":provincia", $outdoor->getProvincia());
            $stmt->bindParam(":municipio", $outdoor->getMunicipio());
            $stmt->bindParam(":comuna", $outdoor->getComuna());
            $stmt->bindParam(":imagem", $outdoor->getImagem());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function listarOutdoor() {
        $query = "SELECT * FROM outdoors";
        $stmt = Db::getConn()->prepare($query);
        $stmt->execute();

        $allOutdoors = array();

        while ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {

            $outdoor = new Outdoor();
            $outdoor->setId($resultado["id"]);
            $outdoor->setTipoOutdoor($resultado["tipoOutdoor"]);
            $outdoor->setPreco($resultado["preco"]);
            $outdoor->setEstado($resultado["estado"]);
            $outdoor->setProvincia($resultado["provincia"]);
            $outdoor->setMunicipio($resultado["municipio"]);
            $outdoor->setComuna($resultado["comuna"]);
            $outdoor->setImagem($resultado["imagem"]);

            $allOutdoors[] = $outdoor;
        }

        return $allOutdoors;
    }

    public function apagarOutdoor($id) {
        $query = 'DELETE FROM outdoors WHERE id = :id';
        $stmt = Db::getConn()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function alugarOutdoor(AlugarOutdoor $alugarOutdoor, $clienteId) {
        try {
            $query_alugarOutdoor = 'INSERT INTO alugar_outdoor (outdoor_id, cliente_id, dataInicio, dataFim) VALUES (:outdoor_id, :cliente_id, :dataInicio, :dataFim)';
            $stmt_alugarOutdoor = Db::getConn()->prepare($query_alugarOutdoor);
            $stmt_alugarOutdoor->bindParam(':outdoor_id', $alugarOutdoor->getId());
            $stmt_alugarOutdoor->bindParam(':cliente_id', $clienteId);
            $stmt_alugarOutdoor->bindParam(':dataInicio', $alugarOutdoor->getDataInicio());
            $stmt_alugarOutdoor->bindParam(':dataFim', $alugarOutdoor->getDataFim());
            $stmt_alugarOutdoor->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function listarOutdoorAlugado() {
        $query = 'SELECT a.outdoor_id, o.tipoOutdoor, o.preco, a.dataInicio, a.dataFim FROM alugar_outdoor a INNER JOIN outdoors o ON a.outdoor_id = o.id WHERE a.cliente_id = "'.$_SESSION['cliente']['id'].'" ';
        $stmt = Db::getConn()->prepare($query);
        $stmt->execute();

        $outdoors = array();

        while ($resultado = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $alugar_outdoor = new AlugarOutdoor();
            $alugar_outdoor->setId($resultado["outdoor_id"]);
            $alugar_outdoor->setTipoOutdoor($resultado["tipoOutdoor"]);
            $alugar_outdoor->setPreco($resultado["preco"]);
            $alugar_outdoor->setDataInicio($resultado["dataInicio"]);
            $alugar_outdoor->setDataFim($resultado["dataFim"]);

            $outdoors[] = $alugar_outdoor;
        }

        return $outdoors;
    }

    public function atualizarEstadoOutdoor($outdoorId, $estado) {
        $query = "UPDATE outdoors SET estado = :estado WHERE id = :outdoorId";
        $stmt = Db::getConn()->prepare($query);
        $stmt->bindValue(':estado', $estado);
        $stmt->bindValue(':outdoorId', $outdoorId);
        $stmt->execute();
    }

    public function apagarOutdoorAlugado($id) {
        $query = 'DELETE FROM alugar_outdoor WHERE outdoor_id = :id';
        $stmt = Db::getConn()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

}
