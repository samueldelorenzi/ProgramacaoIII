<?php

session_start();
//Exibe erros
error_reporting(E_ALL);
ini_set('display_errors', 1);

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if (!$nome || !$email || !$senha ) {
    return "Algo deu errado";
}

if (isset($_POST['lembrar'])) {
    $lembrar = true;
}
else{
    $lembrar = false;
}

$_SESSION['nome'] = $nome;

if ($lembrar) {
    setcookie('email', $email, time() + 3600);
}

header('Location: sessao.php');
exit;