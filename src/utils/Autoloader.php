<?php
namespace Models;

class Autoloader {
    public static function register() {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($class) {
        $class = str_replace('\\', '/', $class);
        $file = ROOT . '/src/' . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
}
