<?php
require_once 'classes/Sessao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1>Cadastro</h1>
            <?php
            // captura, exibe e remove as mensagens guardadas na sessão
            if (Sessao::existe('erro')) {
                echo '<div class="erro">' . Sessao::get("erro") . '</div>';
                Sessao::remover("erro");
            } elseif (Sessao::existe('sucesso')) {
                echo '<div class="sucesso">' . Sessao::get("sucesso") . '</div>';
                Sessao::remover("sucesso");
            }
            ?>
            <form action="processa_cadastro.php" method="POST">
                <label for="nome">
                    <span class="required">Nome</span>
                </label>
                <input type="text" id="nome" name="nome" placeholder="Seu nome" required>

                <label for="email">
                    <span class="required">Email</span>
                </label>
                <input type="email" id="email" placeholder="Seu melhor e-mail" name="email" required>

                <label for="senha">
                    <span class="required">Senha</span>
                </label>
                <input type="password" id="senha" name="senha" placeholder="Senha com no mínimo 8 dígitos" required>

                <button type="submit">Cadastrar</button>
            </form>

            <div class="button-container">
                <a class="btn voltar" href="index.php">Voltar</a>
                <a class="btn login" href="login.php">Login</a>
            </div>
        </div>

    </div>

</body>

</html>