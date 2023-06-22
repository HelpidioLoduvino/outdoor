<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/dbConfig/Db.php';

if (isset($_GET['municipioNome'])) {
    $municipioNome = $_GET['municipioNome'];

    try {
        // Obtenha o ID da província com base no nome recebido
        $queryMunicipio = 'SELECT id FROM municipio WHERE nome = :municipioNome';
        $stmtMunicipio = Db::getConn()->prepare($queryMunicipio);
        $stmtMunicipio->bindParam(':municipioNome', $municipioNome);
        $stmtMunicipio->execute();
        $municipioId = $stmtMunicipio->fetch(PDO::FETCH_ASSOC)['id'];

        // Use o nome da província para buscar os municípios
        $queryComuna = 'SELECT * FROM comuna WHERE municipio_id = :municipioId';
        $stmtComuna = Db::getConn()->prepare($queryComuna);
        $stmtComuna->bindParam(':municipioId', $municipioId);
        $stmtComuna->execute();

        $comunas = $stmtComuna->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($comunas);
    } catch (PDOException $e) {
        header('Content-Type: application/json');
        echo json_encode([]);
    }
}