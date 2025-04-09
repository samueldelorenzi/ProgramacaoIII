<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form class="form" action="processa.php" method="post">
        <label for="nome" >Nome</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="senha" >Senha</label>
        <input type="password" id="senha" name="senha" required>

        <label for="lembrar" >Lembrar de mim:</label>
        <input type="checkbox" id="lembrar" name="lembrar" checked="checked">

        <input type="submit" value="Enviar">
    </form>
</div>
</body>
</html>