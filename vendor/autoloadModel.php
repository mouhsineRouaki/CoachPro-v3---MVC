<?php
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/../app/Models/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});