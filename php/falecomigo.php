<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    $mensagem = "Nome: $nome\n".
                "Email: $email\n".
                "Feedback:\n$feedback\n\n";

    //Cria um arquivo com o feedback da pessoa
    file_put_contents('feedbacks.txt', $mensagem, FILE_APPEND);

    echo "Feedback enviado com sucesso!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fale Comigo</title>
</head>
<body>
    <h2>Fale Comigo:</h2>
    <form action="falecomigo.php" method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="feedback">Feedback:</label><br>
        <textarea id="feedback" name="feedback" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>