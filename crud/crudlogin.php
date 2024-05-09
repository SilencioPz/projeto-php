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
require_once '../conexoes/conexao.php';
require_once '../conexoes/UserDAO.php';

$userDAO = new UserDAO($pdo);

//Inserção de usuários
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome'], $_POST['email'], $_POST['senha'])) {
    // Verificação de erros
    echo "Dados POST recebidos: ";
    print_r($_POST);

    // Cria um hash da senha
    $_POST['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $userDAO->create($_POST);
}

//Leitura dos usuários
$users = $userDAO->read();
foreach ($users as $user) {
    echo "ID: " . $user['id'] . ", Nome: " . $user['nome'] . ", Email: " . $user['email'] . "<br>";
}

//Atualização dos usuários
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['senha'])) {
    // Verificação de erros
    echo "Dados POST recebidos: ";
    print_r($_POST);

    // Cria um hash da senha
    $_POST['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $userDAO->update($_POST);
}

//Deletando usuários
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    // Verificação de erros
    echo "Dados POST recebidos: ";
    print_r($_POST);

    $userDAO->delete($_POST['id']);
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
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"], button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover, button:hover {
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
        <!-- Inserção de dados no Banco de Dados -->
    <hr>
    <h2>Criar Usuário</h2>
    <form action="crudlogin.php" method="post">
        <label for="createNome">Nome:</label><br>
        <input type="text" id="createNome" name="nome"><br>
        <label for="createEmail">Email:</label><br>
        <input type="email" id="createEmail" name="email"><br>
        <label for="createSenha">Senha:</label><br>
        <input type="password" id="createSenha" name="senha"><br>
        <input type="submit" value="Criar">
    </form>
    <hr>
    <!-- Leitura de dados -->
    <h2>Ver Usuários</h2>
    <form action="crudlogin.php" method="post">
        <input type="submit" value="Ver">
    </form>
    <hr>
    <!-- Atualização dos dados de um usuário -->
    <h2>Atualizar Usuário</h2>
    <form action="crudlogin.php" method="post">
        <label for="updateId">ID do Usuário:</label><br>
        <input type="text" id="updateId" name="id"><br>
        <label for="updateNome">Novo Nome:</label><br>
        <input type="text" id="updateNome" name="nome"><br>
        <label for="updateEmail">Novo Email:</label><br>
        <input type="email" id="updateEmail" name="email"><br>
        <label for="updateSenha">Nova Senha:</label><br>
        <input type="password" id="updateSenha" name="senha"><br>
        <input type="submit" value="Atualizar">
    </form>
    <hr>
    <!-- Deleção de dados -->
    <h2>Deletar Usuário</h2>
    <form action="crudlogin.php" method="post">
        <label for="deleteId">ID do Usuário:</label><br>
        <input type="text" id="deleteId" name="id"><br>
        <input type="submit" value="Deletar">
    </form>
    <hr>

    <!-- Link CRUD de Imagens -->
    <h2>Gerenciar Fotos</h2>
    <form action="crudfotos.php" method="post">
        <input type="submit" value="Ir para Gerenciamento de Imagens">
    </form>
    <hr>
    <h2>Redirecionamento</h2>
    <button onclick="location.href='../php/login.php'" type="button">Ir para Login</button>
    <hr>
</body>

</html>