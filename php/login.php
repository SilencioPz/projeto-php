<?php
//Chave secreta do Recaptcha
$recaptchaResponse = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';
$secretKey = "6LdQV8gpAAAAANCrmM3KmbBZR1VSqzMJYrkTITfk";

$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
    'secret' => $secretKey,
    'response' => $recaptchaResponse
);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$recaptchaResult = json_decode($result);

//Verificação de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexões com DAO e MySQL
require_once '../conexoes/DAO.php';
require_once '../conexoes/conexao.php';
require_once '../conexoes/UserDAO.php';

$userDAO = new UserDAO($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["senha"])) {
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        if (empty($email) || empty($senha)) {
            echo "Por favor, preencha todos os campos.";
        } else {
            $user = $userDAO->readByEmail($email);

            if ($user && password_verify($senha, $user['senha'])) {
                // Verificação do reCAPTCHA
                if ($recaptchaResult->success) {
                    header('Location: ../principal.html');
                } else {
                    echo "Por favor, verifique o reCAPTCHA.";
                    exit; // Pára a execução do script se o reCAPTCHA falhar
                }
            } else {
                header('Location: login.php');
                exit;
            }
        }
    }
}

ob_end_flush();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: blue;
        }

        h2 {
            color: green;
        }

        .g-recaptcha {
            display: inline-block;
        }

        @media only screen and (max-width: 600px) {
            body {
                font-size: 18px;
            }

            /*CSS pro Recaptcha*/
            .g-recaptcha {
                transform: scale(0.77);
                -webkit-transform: scale(0.77);
                transform-origin: 0 0;
                -webkit-transform-origin: 0 0;
            }
        }
    </style>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <h1>Faça login ou cadastre-se para continuar</h1>

    <h2>Login
    </h2>
    <form action="login.php" method="post">
        <label for="email" style="color: red">E-mail de usuário:</label>
        <input type="text" id="email" name="email">
        <label for="senha" style="color: red">Senha:</label>
        <input type="password" id="senha" name="senha">
        <form action="?" method="POST">
            <div class="g-recaptcha" data-sitekey="6LdQV8gpAAAAAAnjtO5001rbinAmmk0OV2LF-n6k"></div>
            <input type="submit" value="Login">
        </form>
    </form>
    <p>Caso não seja cadastro, <a href="cadastro.php">clique aqui</a></p>
    <hr>
    <script type="text/javascript">
        var onloadCallback = function() {
            alert("grecaptcha is ready!");
        };
    </script>
</body>

</html>