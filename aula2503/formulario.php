<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário de contato</title>
</head>
<body>

<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
elseif (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}

?>

<h2>Formulário de contato</h2>
<form action="process/enviar.php" method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome">
    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email">
    <input type="submit" value="Enviar">
</form>

</body>
</html>