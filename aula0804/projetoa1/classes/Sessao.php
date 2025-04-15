<?php

// classe de manipulacao de sessoes
class Sessao
{
    public static function iniciar()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    // antes dos metodos que manipulam a sessao ela é sempre iniciada
    public static function destruir()
    {
        self::iniciar();
        $_SESSION = [];
        session_destroy();
    }

    public static function get($key)
    {
        self::iniciar();
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return null;
    }
    public static function existe($key)
    {
        self::iniciar();
        return isset($_SESSION[$key]);
    }
    public static function set($key, $value)
    {
        self::iniciar();
        $_SESSION[$key] = $value;
    }
    public static function remover($key)
    {
        self::iniciar();
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
}