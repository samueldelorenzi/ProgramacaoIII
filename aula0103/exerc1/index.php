<?php

include "veiculo.php";

$veiculo = new veiculo("Ford", "Fiesta", 2013);
$ficha = $veiculo->exibirFicha();
echo $ficha;

