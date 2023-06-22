<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/dbConfig/Db.php';

if (isset($_GET['municipioId'])) {
    $municipioId = $_GET['municipioId'];
    
    try {
        $query = 'SELECT * FROM comuna WHERE municipio_id = :municipioId';
        $stmt = Db::getConn()->prepare($query);
        $stmt->bindParam(':municipioId', $municipioId);
        $stmt->execute();
        
        $comunas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Retorne as comunas como JSON
        header('Content-Type: application/json');
        echo json_encode($comunas);
    } catch (PDOException $e) {
        header('Content-Type: application/json');
        echo json_encode([]);
    }
}