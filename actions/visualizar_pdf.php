<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/dbConfig/Db.php';

function buscarPdf($outdoorId) {
    $query = 'SELECT pdf from analisar_aluguer where outdoor_id = "' . $outdoorId . '"';
    $stmt = Db::getConn()->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
    $pdfContent = $resultado['pdf'];
    return $pdfContent;
}

// Verifique se o parâmetro outdoorId está presente na URL
if (isset($_GET['outdoorId'])) {
    // Obtenha o ID do outdoor da URL
    $outdoorId = $_GET['outdoorId'];

    // Recupere o conteúdo do PDF do banco de dados com base no ID
    $pdfContent = buscarPdf($outdoorId);

    if ($pdfContent !== false) {
        // Defina os cabeçalhos para indicar que o conteúdo é um PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="arquivo.pdf"');

        // Exiba o conteúdo do PDF
        echo $pdfContent;
        exit; // Encerre o script para evitar a exibição de outros conteúdos
    }
}

// Se chegarmos até aqui, ocorreu algum erro ou o outdoorId não foi fornecido
echo "Erro ao visualizar o PDF.";
