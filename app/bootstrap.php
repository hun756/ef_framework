<?php

// config
require_once 'config/config.php';

// autoload core libraries
spl_autoload_register(function ($className) {
    require_once 'lib/' . $className . '.php';
}); 