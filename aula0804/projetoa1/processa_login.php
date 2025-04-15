<?php

require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';
require_once 'classes/Sessao.php';
require_once 'auxiliares.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["email"]);
    $senha = test_input($_POST["senha"]);
    $lembrar = isset($_POST["lembrar"]) ? $_POST["lembrar"] : "off";

    if (empty($email) || empty($senha)) {
        Sessao::set("erro", "Todos os campos são obrigatórios");
        header('Location: login.php');
        exit;
    }

    $autenticador = new Autenticador();
    $usuario = $autenticador->autenticar($email, $senha);
    if ($usuario) {
        Sessao::set('nome', $usuario->getNome());
        if ($lembrar == "on") {
            setcookie("lembrar", $email, time() + 3600, "/");
        } else {
            setcookie("lembrar", "", time() - 3600, "/");
        }
        header('Location: dashboard.php');
    } else {
        Sessao::set("erro", "E-mail ou senha inválidos");
        header('Location: login.php');
    }
}
