<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexões com DAO e conexão com MySQL
require_once '../conexoes/DAO.php';
require_once '../conexoes/conexao.php';
require_once '../conexoes/UserDAO.php';

$UserDAO = new UserDAO($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeCadastro = $_POST['nome'];
    $emailCadastro = $_POST['email'];
    $senhaCadastro = $_POST['senha'];

    // Validação do nome
    if (strlen($nomeCadastro) < 2) {
        echo 'O nome deve ter no mínimo 2 letras.';
        echo '<br><button onclick="location.href=\'cadastro.php\'" type="button">Voltar ao Cadastro</button>';
        exit;
    }

    // Validação adicional para o nome: apenas letras são permitidas
    if (!ctype_alpha(str_replace(' ', '', $nomeCadastro))) {
        echo 'O nome deve conter apenas letras. Sem acentuações, por favor.';
        echo '<br><button onclick="location.href=\'cadastro.php\'" type="button">Voltar ao Cadastro</button>';
        exit;
    }

    // Validação do e-mail
    $allowed_domains = ['gmail.com', 'outlook.com', 'yahoo.com'];
    $email_domain = substr(strrchr($emailCadastro, "@"), 1);
    if (!in_array($email_domain, $allowed_domains)) {
        echo 'O domínio do e-mail deve ser gmail.com, outlook.com ou yahoo.com.';
        echo '<br><button onclick="location.href=\'cadastro.php\'" type="button">Voltar ao Cadastro</button>';
        exit;
    }

    // Verificar se o e-mail já existe
    $user = $UserDAO->readByEmail($emailCadastro);
    if ($user) {
        echo 'Este e-mail já está sendo usado.';
        echo '<br><button onclick="location.href=\'cadastro.php\'" type="button">Voltar ao Cadastro</button>';
        exit;
    }

    // Validação da senha
    if (strlen($senhaCadastro) < 8 || strlen($senhaCadastro) > 60) {
        echo 'Senha com no mínimo 8 máximo 60 caracteres.';
        echo '<br><button onclick="location.href=\'cadastro.php\'" type="button">Voltar ao Cadastro</button>';
        exit;
    }

    // Aplicar password_hash após a validação
    $senhaCadastro = password_hash($senhaCadastro, PASSWORD_DEFAULT);

    // Inserir o usuário
    $UserDAO->create([
        'nome' => $nomeCadastro,
        'email' => $emailCadastro,
        'senha' => $senhaCadastro
    ]);

    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cadastro</title>
    <style>
        .center {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .center input {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center; color: blue">Cadastro de Usuários</h1>
    <div class="center">
        <form action="cadastro.php" method="post">
            <label for="nome" style="color: red">Nome:</label>
            <input type="text" id="nome" name="nome">
            <label for="email" style="color: red">Email:</label>
            <input type="email" id="email" name="email">
            <label for="senha" style="color: red">Senha:</label>
            <input type="password" id="senha" name="senha">
            <input type="submit" value="Cadastrar" style="background-color: green; color: white;">
        </form> 
        <p>Caso seja cadastro, <a href="login.php">clique aqui</a></p>
        <hr>
    </div>
</body>

</html>