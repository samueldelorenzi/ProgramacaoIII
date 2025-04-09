<?php

class veiculo
{
    public string $marca;
    public string $modelo;
    public int $ano;

    public function __construct($marca, $modelo, $ano)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
    }
    public function exibirFicha(): string
    {
        return "Marca: $this->marca<br>Modelo: $this->modelo<br>Ano: $this->ano<br>";
    }
}