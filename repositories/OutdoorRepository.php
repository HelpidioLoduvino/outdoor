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

}
