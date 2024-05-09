<?php
//Conexões com o BD
require '../conexoes/DAO.php';
$pdoFotos = require '../conexoes/conexaoF.php';

//Captura o que foi digitado na barra de pesquisa
$pesquisa = $_GET['pesquisa'];

//Select no BD, que mostra nome ou descrição do livro
$stmt = $pdoFotos->prepare("SELECT * FROM imagens_link WHERE nome LIKE ? OR descricao LIKE ?");
$stmt->execute(["%$pesquisa%", "%$pesquisa%"]);
$resultados = $stmt->fetchAll();

// Início do HTML
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>Resultados da Pesquisa</title>";
echo "</head>";
echo "<body>";
echo "<div style='display: flex; justify-content: center;'>";
echo "<img src='../logo-quie-isso-att-3.png' alt='Logo do Site' style='width: 25%; height: auto; max-width: 100%;'>";
echo "</div>";

echo "<h1>Resultados da Pesquisa</h1>";

// Loop através dos resultados e exiba cada um
foreach ($resultados as $resultado) {
    echo "<div>";
    echo "<h2>" . $resultado['nome'] . "</h2>";
    echo "<p>" . $resultado['descricao'] . "</p>";
    echo "<a href='" . $resultado['link'] . "' target='_blank'>Ver Imagem</a>";
    echo "<br>";
    echo "</div>";
}

// Volta ao principal.html
echo "<br>";
echo "<button onclick=\"location.href='../principal.html'\">Voltar</button>";

echo "</body>";
echo "</html>";