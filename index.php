<?php
    ini_set('display_errors',0);
    error_reporting(E_ALL);

    define('ROOT', dirname(__FILE__));
    include_once(ROOT.'/components/Router.php');
    include_once(ROOT.'/components/Db.php');

    spl_autoload_register(function ($class_name) {
        include ROOT."/components/Classes/$class_name.php";
    });


    $router = new Router;
    $router->run();

?>



