<?php
require_once 'classes/Sessao.php';
Sessao::destruir();
setcookie("lembrar", "", time() - 3600, "/");
Sessao::set("sucesso", "Logout realizado com sucesso!");
header("Location: login.php");
exit();