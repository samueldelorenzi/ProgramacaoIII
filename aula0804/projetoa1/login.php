<?php

require_once 'classes/Sessao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1>Login</h1>
            <?php
            // captura, exibe e remove as mensagens guardadas na sessão
            if (Sessao::existe('erro')) {
                echo '<div class="erro">' . Sessao::get("erro") . '</div>';
                Sessao::remover("erro");
            }
            if (Sessao::existe('sucesso')) {
                echo '<div class="sucesso">' . Sessao::get("sucesso") . '</div>';
                Sessao::remover("sucesso");
            }
            ?>
            <form action="processa_login.php" method="POST">
                <label for="email">
                    <span class="required">E-mail</span>
                </label>
                <input type="email" id="email" placeholder="E-mail cadastrado" name="email" required>

                <label for="senha">
                    <span class="required">Senha</span>
                </label>
                <input type="password" id="senha" name="senha" placeholder="Senha cadastrada" required>

                <div class="checkbox-container">
                    <label for="lembrar">Lembrar de mim:</label>
                    <input type="checkbox" id="lembrar" name="lembrar" checked="checked">
                </div>

                <button type="submit">Entrar</button>
            </form>
            <div class="button-container">
                <a class="btn voltar" href="index.php">Voltar</a>
                <a class="btn cadastro" href="cadastro.php">Cadastro</a>
            </div>
        </div>
    </div>

</body>

</html>