<?php

require_once 'classes/Sessao.php';
require_once 'classes/Autenticador.php';
require_once 'classes/Usuario.php';

if (!Sessao::existe("nome")) {
    header("Location: login.php");
    Sessao::set("erro", "Acesso negado! Você não está logado.");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="container">
        <div class="index-container">
            <h1>Bem-vindo(a) <?php echo htmlspecialchars(Sessao::get("nome")) ?></h1>
            <p>Você está logado(a)!</p>
            <?php
            if ($_COOKIE["lembrar"] ?? false) {
                echo "<p>Seu e-mail foi guardado: " . htmlspecialchars($_COOKIE["lembrar"]) . "</p>";
            } else {
                echo "<p>Você optou por não ter seu e-mail guardado.</p>";
            }

            ?>
            <div class="button-container">
                <a class="btn sair" href="logout.php">Sair</a>
                <a class="btn login" href="login.php">Login</a>
                <a class="btn cadastro" href="cadastro.php">Cadastro</a>
            </div>
        </div>
    </div>
</body>

</html>