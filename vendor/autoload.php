<?php
spl_autoload_register(function ($class) {
    require __DIR__ . '/../app/Models/' . $class . '.php';
});
