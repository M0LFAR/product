<?php
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
error_reporting(0);
define('ROOT', dirname(__FILE__));

require_once(ROOT.'/components/Router.php');

spl_autoload_register(function ($class_name) {
    try {
        $wayToFile = ROOT . '/' . str_replace("\\", "/", $class_name) . '.php';

        if (!file_exists($wayToFile))
            throw new Exception ("Файл: $wayToFile відсутній");
        else
            require_once($wayToFile);
    }catch(Exception $e) {
        echo "Message : " . $e->getMessage();
        echo "Code : " . $e->getCode();
    }

});



$router = new Router();
$router->run();
