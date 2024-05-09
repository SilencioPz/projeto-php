<?php

require_once '../config.php';

// Autenticação HTTP básica
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Protected Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Autenticação necessária';
    exit;
} else {
    if ($_SERVER['PHP_AUTH_USER'] !== $admin_credentials['email'] || $_SERVER['PHP_AUTH_PW'] !== $admin_credentials['password']) {
        // O usuário ou a senha não são válidos
        header('WWW-Authenticate: Basic realm="My Protected Area"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Autenticação necessária';
        exit;
    }
}

//Conexões com DAO e conexão com MySQL
require_once '../conexoes/DAO.php';
require_once '../conexoes/conexaoF.php';
require_once '../conexoes/ImageDAO.php';

$imageDAO = new ImageDAO($pdoFotos);

//Inserção de Imagens
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome'], $_POST['descricao'], $_POST['link'])) {
    $imageDAO->create($_POST);
}

//Pesquisa de Imagens
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pesquisa'])) {
    $images = $imageDAO->read();
    foreach ($images as $image) {
        if (strpos($image['descricao'], $_POST['pesquisa']) !== false) {
            echo '<img src="' . $image['link'] . '" alt="' . $image['descricao'] . '">';
        }
    }
}

//Atualização de Imagens
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'], $_POST['nome'], $_POST['descricao'], $_POST['link'])) {
    $imageDAO->update($_POST);
}

//Deleção de Imagens
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $imageDAO->delete($_POST['id']);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>CRUD</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        form {
            margin: 20px 0;
            width: 100%;
            max-width: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"],
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #45a049;
        }

        @media (max-width: 600px) {
            body {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <!-- Inserção de Imagens -->
    <hr>
    <h2>Criar Imagem</h2>
    <form action="crudfotos.php" method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="descricao">Descrição:</label><br>
        <input type="text" id="descricao" name="descricao"><br>
        <label for="link">Link da Imagem:</label><br>
        <input type="text" id="link" name="link"><br>
        <input type="submit" value="Criar">
    </form>
    <hr>
    <!-- Pesquisa de Imagens -->
    <h2>Pesquisar Imagens</h2>
    <form action="crudfotos.php" method="post">
        <label for="pesquisa">Descrição:</label><br>
        <input type="text" id="pesquisa" name="pesquisa"><br>
        <input type="submit" value="Pesquisar">
    </form>
    <hr>
    <!-- Atualização de Imagens -->
    <h2>Atualizar Imagem</h2>
    <form action="crudfotos.php" method="post">
        <label for="id">ID da Imagem:</label><br>
        <input type="text" id="id" name="id"><br>
        <label for="nome">Novo Nome:</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="descricao">Nova Descrição:</label><br>
        <input type="text" id="descricao" name="descricao"><br>
        <label for="link">Novo Link da Imagem:</label><br>
        <input type="text" id="link" name="link"><br>
        <input type="submit" value="Atualizar">
    </form>
    <hr>
    <!--Deleção de Imagens-->
    <h2>Deletar Imagem</h2>
    <form action="crudfotos.php" method="post">
        <label for="id">ID da Imagem:</label><br>
        <input type="text" id="id" name="id"><br>
        <input type="submit" value="Deletar">
    </form>
    <hr>
    <h2>Redirecionamento</h2>
    <button onclick="location.href='crudlogin.php'" type="button">Ir para CRUD Login</button>
    <hr>
    <button onclick="location.href='../php/login.php'" type="button">Ir para Login</button>
    <hr>
</body>

</html>