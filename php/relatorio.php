<?php
require_once '../conexoes/conexaoF.php';
require_once '../conexoes/ImageDAO.php';
require_once '../conexoes/DAO.php';

$imageDAO = new ImageDAO($pdoFotos);

$fotos = $imageDAO->read();

echo '<div style="text-align: center;">';
echo '<img src="../logo-quie-isso-att-3.png" alt="Logo do site" style="max-width: 25%; height: auto;">';
echo '</div>';

//Gera relatório com tudo informado no BD
foreach ($fotos as $foto) {
    echo "Livro:"."<br>";
    echo "ID: " . $foto['id'] . "<br>";
    echo "Nome: " . $foto['nome'] . "<br>";
    echo "Descrição: " . $foto['descricao'] . "<br>";
    echo "Link: " . $foto['link'] . "<br>";
    echo "<hr>";
}
?>