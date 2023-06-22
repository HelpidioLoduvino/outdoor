<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/dbConfig/Db.php';

if (isset($_GET['provinciaId'])) {
    $provinciaId = $_GET['provinciaId'];

    try {
        $query = 'SELECT * FROM municipio WHERE provincia_id = :provinciaId';
        $stmt = Db::getConn()->prepare($query);
        $stmt->bindParam(':provinciaId', $provinciaId);
        $stmt->execute();

        $municipios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($municipios);
    } catch (PDOException $e) {
        header('Content-Type: application/json');
        echo json_encode([]);
    }
}

