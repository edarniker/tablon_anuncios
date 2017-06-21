<?php

//ini_set('display_errors', 1);
if (true) {
    require_once 'Log.php';
} else {
    error_reporting("E_ALL");
}


try {


    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', realpath(dirname(__FILE__)) . DS);


    require_once './Config/Autoload.php';
    require_once './Config/Config.php';


    Config\Autoload::run();
    require_once './Config/Registry.php';

    Config\Session::init();
//    echo \Config\Hash::getHash('sha1', '1234', HASH_KEY);exit;
//$r=new Config\Request();
//
//echo $r->getControlador()."<br>";
//echo $r->getMetodo()."<br>";
//print_r($r->getArgumentos());


    Config\Router::run($r = $registry->request);
//    var_dump($r->getControlador(),$r->getMetodo(),$r->getArgumentos());
} catch (Exception $e) {
    abrir($e);
//    echo $e->getMessage();
//     $typestr=$e->getMessage();
//     $errfile=$e->getFile();
//     $errline=$e->getLine();
//     if(TRUE)
//            $message = "<hr><div class='label label-danger'><b>$typestr:  IN FILE: </b>$errfile</div><hr>";
//    $report = "[".date("Y-m-d h:m:s")."][MENSAJE '$typestr'][IN FILE $errfile] [LINEA $errline] \n";
//    error_log($report, 3, "errors.log");
//   
//    
//    $error = error_get_last();
////
//    if($error && ($error['type'] & E_FATAL)){
//        handler($error['type'], $error['message'], $error['file'], $error['line']);
//    }
//    if(!($error & E_ALL))
//        return;
//    if(DISPLAY_ERRORS)
//    printf('%s', $message);
//    exit;
//    var_dump($e->getMessage());
//}
}


