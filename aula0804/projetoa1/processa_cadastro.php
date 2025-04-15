<?php

require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';
require_once 'classes/Sessao.php';
require_once 'auxiliares.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = test_input($_POST["nome"]);
    $email = test_input($_POST["email"]);
    $senha = test_input($_POST["senha"]);

    if (empty($nome) || empty($email) || empty($senha)) {
        Sessao::set("erro", "Todos os campos são obrigatórios");
        header('Location: cadastro.php');
        exit;
    }
    if (strlen($senha) < 8) {
        Sessao::set("erro", "A senha deve ter no mínimo 8 dígitos");
        header("Location: cadastro.php");
        exit;
    }

    $usuario = new Usuario($nome, $email, $senha);

    $autenticador = new Autenticador();
    $resultado = $autenticador->adicionar($usuario);
    if ($resultado) {
        Sessao::set("sucesso", "Cadastro realizado com sucesso");
        header('Location: cadastro.php');
    } else {
        Sessao::set("erro", "E-mail já cadastrado. Faça login para continuar.");
        header('Location: cadastro.php');
    }
}

