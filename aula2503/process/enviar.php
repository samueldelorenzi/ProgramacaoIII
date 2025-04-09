<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$nome = $_POST['nome'] ?? "";
$email = $_POST['email'] ?? "";

if ($nome !== "" && $email !== "" ) {
    $_SESSION['success'] = "Recebemos seu email: $email";
}
else {
    $_SESSION['error'] = "Não recebemos seu email";
}

header("Location: " . $_SERVER['HTTP_REFERER']);