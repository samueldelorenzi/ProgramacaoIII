<?php

session_start();

if (!isset($_SESSION['nome'])) {
    header('Location: index.php');
    exit;
}

$usuario = $_SESSION['nome'];
$email = $_COOKIE['email'] ?? "Não lembrado";

session_destroy();
cook
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bem vindo</title>
</head>
<body>
    <p>Você é <?php echo $usuario ?></p>
    <p>Seu e-mail é <?php echo $email?></p>
</body>
</html>

