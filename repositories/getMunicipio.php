<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/dbConfig/Db.php';

if (isset($_GET['provinciaNome'])) {
    $provinciaNome = $_GET['provinciaNome'];

    try {
        // Obtenha o ID da província com base no nome recebido
        $queryProvincia = 'SELECT id FROM provincia WHERE nome = :provinciaNome';
        $stmtProvincia = Db::getConn()->prepare($queryProvincia);
        $stmtProvincia->bindParam(':provinciaNome', $provinciaNome);
        $stmtProvincia->execute();
        $provinciaId = $stmtProvincia->fetch(PDO::FETCH_ASSOC)['id'];

        // Use o nome da província para buscar os municípios
        $queryMunicipio = 'SELECT * FROM municipio WHERE provincia_id = :provinciaId';
        $stmtMunicipio = Db::getConn()->prepare($queryMunicipio);
        $stmtMunicipio->bindParam(':provinciaId', $provinciaId);
        $stmtMunicipio->execute();

        $municipios = $stmtMunicipio->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($municipios);
    } catch (PDOException $e) {
        header('Content-Type: application/json');
        echo json_encode([]);
    }
}   