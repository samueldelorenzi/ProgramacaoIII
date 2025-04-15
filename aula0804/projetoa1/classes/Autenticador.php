<?php

require_once 'Sessao.php';
require_once 'Usuario.php';

class Autenticador
{
    private $usuarios = [];

    public function __construct()
    {
        if (Sessao::existe('usuarios')) {
            $this->usuarios = Sessao::get('usuarios');
        }
    }

    public function adicionar(Usuario $usuario)
    {
        foreach ($this->usuarios as $u) {
            if ($u->getEmail() === $usuario->getEmail()) {
                return false; // email já cadastrado
            }
        }
        $this->usuarios[] = $usuario;
        Sessao::set('usuarios', $this->usuarios);
        return true; // cadastrado
    }

    public function autenticar($email, $senha)
    {
        foreach ($this->usuarios as $usuario) {
            if ($usuario->getEmail() === $email && password_verify($senha, $usuario->getSenha())) {
                return $usuario; // retorna o cadastro do usuario
            }
        }
        return false;
    }
}
